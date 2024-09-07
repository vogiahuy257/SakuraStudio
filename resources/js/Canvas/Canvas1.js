// Get references to the HTML elements
const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');
const excelInput = document.getElementById('excelInput');
const generateAllButton = document.getElementById('generateAllButton');
const printAllButton = document.getElementById('printAllButton');
const outputContainer = document.getElementById('outputContainer');
const bgImage = new Image();

let textPosition = { x: canvas.width / 2, y: canvas.height / 2 };
let currentName = 'Name';
let currentPosition = 'Position';
let currentCompanyName = 'Company Name';
let currentEmail = 'Email';
let isDragging = false;
let data = [];
let finalTextPosition = { x: canvas.width / 2, y: canvas.height / 2 };

// Set default background image
bgImage.src = '/image/canvas/Canvas1.svg'; // Change this path to the actual path of your default background image
bgImage.onload = function() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(bgImage, 0, 0, canvas.width, canvas.height);
    drawFrame();
    drawText(currentName, currentPosition, currentCompanyName, currentEmail); // Vẽ mẫu sẵn
};

canvas.addEventListener('mousedown', function(event) {
    const rect = canvas.getBoundingClientRect();
    const x = event.clientX - rect.left;
    const y = event.clientY - rect.top;
    if (isTextClicked(x, y)) {
        isDragging = true;
    }
});

canvas.addEventListener('mousemove', function(event) {
    if (isDragging) {
        const rect = canvas.getBoundingClientRect();
        textPosition.x = event.clientX - rect.left;
        textPosition.y = event.clientY - rect.top;
        redrawCanvas();
    }
});

canvas.addEventListener('mouseup', function() {
    if (isDragging) {
        finalTextPosition = { ...textPosition };
        isDragging = false;
    }
});

canvas.addEventListener('mouseleave', function() {
    isDragging = false;
});

excelInput.addEventListener('change', function() {
    if (excelInput.files && excelInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const rowData = new Uint8Array(e.target.result);
            const workbook = XLSX.read(rowData, { type: 'array' });
            const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
            const rows = XLSX.utils.sheet_to_json(firstSheet, { header: 1 });
            const parsedData = rows.slice(1).map(row => ({
                name: row[1],
                position: row[2],
                companyName: row[3],
                email: row[4]
            })).filter(item => item.name && item.position && item.companyName && item.email);

            if (parsedData.length > 0) {
                data = parsedData; // Assign to global variable data
                currentName = data[0].name;
                currentPosition = data[0].position;
                currentCompanyName = data[0].companyName;
                currentEmail = data[0].email;
                redrawCanvas();
                generateAllButton.style.display = 'block';
                printAllButton.style.display = 'block';
            } else {
                alert('No valid data found in the Excel file.');
            }
        };
        reader.readAsArrayBuffer(excelInput.files[0]);
    }
});

generateAllButton.addEventListener('click', function() {
    generateCards(data);
});

printAllButton.addEventListener('click', function() {
    downloadAllCards();
});

function isTextClicked(x, y) {
    ctx.font = '30px Arial';
    const textMetrics = ctx.measureText(currentName);
    const textWidth = textMetrics.width;
    const textHeight = parseInt(ctx.font, 10);
    const textX = textPosition.x - textWidth / 2;
    const textY = textPosition.y - textHeight / 2;

    return (
        x >= textX &&
        x <= textX + textWidth &&
        y >= textY &&
        y <= textY + textHeight
    );
}

function drawFrame() {
    ctx.strokeStyle = 'white';
    ctx.lineWidth = 10;
    ctx.strokeRect(5, 5, canvas.width - 10, canvas.height - 10);
}

function redrawCanvas() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(bgImage, 0, 0, canvas.width, canvas.height);
    drawFrame();
    drawText(currentName, currentPosition, currentCompanyName, currentEmail);
}

function drawText(name, position, companyName, email) {
    ctx.font = '25px  Arial'; 
    ctx.fillStyle = 'black';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.shadowColor = 'transparent';
    ctx.shadowBlur = 0;
    ctx.shadowOffsetX = 0;
    ctx.shadowOffsetY = 0;

    const yOffset = 40;
    ctx.fillText(name, textPosition.x, textPosition.y - yOffset);
    ctx.fillText(position, textPosition.x, textPosition.y);
    ctx.fillText(companyName, textPosition.x, textPosition.y + yOffset);
    ctx.fillText(email, textPosition.x, textPosition.y + 2 * yOffset);
}

function generateCards(data) {
    const userSection = document.querySelector('.User');
    userSection.innerHTML = '';

    data.forEach(item => {
        const cardContainer = document.createElement('div');
        cardContainer.classList.add('card');

        const canvasClone = document.createElement('canvas');
        canvasClone.width = canvas.width;
        canvasClone.height = canvas.height;
        const ctxClone = canvasClone.getContext('2d');
        
        // Draw background image on the cloned canvas
        ctxClone.drawImage(bgImage, 0, 0, canvasClone.width, canvasClone.height);

        // Draw text on the cloned canvas
        drawTextOnCanvas(ctxClone, item.name, item.position, item.companyName, item.email);

        // Convert canvas to image
        const image = new Image();
        image.src = canvasClone.toDataURL();
        image.className = 'output-image';

        // Append image to card container
        cardContainer.appendChild(image);

        // Append the card container to the User section
        userSection.appendChild(cardContainer);
    });
}

function drawTextOnCanvas(ctx, name, position, companyName, email) {
    ctx.font = '25px Arial'; 
    ctx.fillStyle = 'black';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.shadowColor = 'transparent';
    ctx.shadowBlur = 0;
    ctx.shadowOffsetX = 0;
    ctx.shadowOffsetY = 0;

    const yOffset = 40;
    ctx.fillText(name, finalTextPosition.x, finalTextPosition.y - yOffset);
    ctx.fillText(position, finalTextPosition.x, finalTextPosition.y);
    ctx.fillText(companyName, finalTextPosition.x, finalTextPosition.y + yOffset);
    ctx.fillText(email, finalTextPosition.x, finalTextPosition.y + 2 * yOffset);
}

function downloadAllCards() {
    const zip = new JSZip();
    const promises = [];
    const progress = document.querySelector('.progress-bar');
    const outputImages = outputContainer.querySelectorAll('.output-image');
    const totalImages = outputImages.length;
    let completedImages = 0;

    // Function to handle each image
    function handleImage(img, index) {
        return new Promise((resolve, reject) => {
            const image = new Image();
            image.onload = function() {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                canvas.width = image.width;
                canvas.height = image.height;
                ctx.drawImage(image, 0, 0);

                canvas.toBlob(blob => {
                    if (!blob) {
                        reject(new Error('Canvas.toBlob returned null'));
                        return;
                    }
                    zip.file(`card_${index + 1}_${Date.now()}.png`, blob);
                    // Update progress bar
                    completedImages++;
                    const percent = (completedImages / totalImages) * 100;
                    progress.style.width = `${percent}%`;
                    progress.textContent = `${Math.round(percent)}%`;

                    resolve(); // Resolve the promise here
                }, 'image/png');
            };
            image.onerror = function() {
                reject(new Error('Image loading failed'));
            };
            image.src = img.src;
        });
    }

    // Queue up promises for each image
    outputImages.forEach((img, index) => {
        promises.push(handleImage(img, index));
    });

    // Show progress bar
    document.querySelector('.progress').style.display = 'block';

    // Wait for all promises to resolve
    Promise.all(promises).then(() => {
        // Wait for a short delay before triggering download
        setTimeout(() => {
            zip.generateAsync({ type: 'blob' }).then(content => {
                const link = document.createElement('a');
                link.href = URL.createObjectURL(content);
                link.download = 'list_of_thank_you_cards_2.zip';
                link.click();
                document.querySelector('.progress').style.display = 'none';
            });
        }, 100); // Adjust the delay as needed
    }).catch(error => {
        console.error('Error processing images:', error);
        // Handle error if needed
    });
}
