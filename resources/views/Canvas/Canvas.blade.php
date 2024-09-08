<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas Design</title>

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"> 
    <!-- Link logo icon -->
    <link rel="icon" href="{{'/image/ICONlogo.svg'}}" type="image/x-icon">

    <!-- Link styles.css -->
    @vite([
    'resources/css/CanvasPro.css'
    ])

</head>
<body>

    @include('Home.layout.menu')

    @include('Canvas.layout.index')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Link filer zip --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <!-- Link to xlsx.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    {{-- link bootstrap icon --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
                    loadLanguage('{{ session('locale', 'en') }}');
            });
                function loadLanguage(lang) {
            fetch(`/js/lang/${lang}.json`)
            .then(response => response.json())
                .then(data => {

                    // lang Home\lang\menu
                    @include('Home.lang.menu');
                    // lang Canvas\lang\CanvasPro
                    @include('Canvas.lang.CanvasPro');
            })
                .catch(error => console.error('Error loading language file:', error));
            }
    </script>


    <script>
        
document.addEventListener('DOMContentLoaded', (event) => {

const mainCanvas = document.getElementById('myCanvas');
const mainCtx = mainCanvas.getContext('2d');
const coordinates = [];  // Mảng lưu tọa độ các thẻ
const printAllButton = document.getElementById('printAllButton');

let currentFieldId = null;
let bgImage = new Image();
bgImage.src = "{{ asset($card->image_path) }}";

bgImage.onload = function() {
    mainCtx.drawImage(bgImage, 0, 0, mainCanvas.width, mainCanvas.height);  // Vẽ ảnh khi đã tải xong
};


// Text input elements
const newTextInput = document.getElementById('newTextInput');
const addTextButton = document.getElementById('addTextButton');
const textHeader = document.getElementById('listText');

// Setup font
let fontFamily = document.getElementById('fontFamily').value;
let fontColor = document.getElementById('fontColor').value;
let fontStyle;

function updateFontFamily() {
    const fontFamilySelect = document.getElementById('fontFamily');
    const selectedOption = fontFamilySelect.options[fontFamilySelect.selectedIndex];
    const fontFamily = selectedOption.style.fontFamily;

    fontFamilySelect.style.fontFamily = fontFamily;
    checkFontFamily();
}

document.getElementById('fontFamily').addEventListener('change', updateFontFamily);

document.querySelectorAll('.toolbar .btn').forEach(button => {
    button.addEventListener('click', () => {
        if (button.classList.contains('btnActive')) {
            button.classList.remove('btnActive');
        } else {
            button.classList.add('btnActive');
        }
    });
});

function checkFontFamily() {
    const fontSize = document.getElementById('fontSize').value;
    fontColor = document.getElementById('fontColor').value;
    fontStyle = document.querySelectorAll('.btnActive');
    let stringFontStyle = '';
    fontStyle.forEach(e => {
        stringFontStyle += e.innerText + ' ';
    });

    fontFamily = stringFontStyle;
    fontFamily += fontSize + 'px ';
    fontFamily += document.getElementById('fontFamily').value;

    mainCtx.font = fontFamily;
    mainCtx.fillStyle = fontColor;

    console.log(fontFamily, fontColor);
}

function drawBackgroundImage() {
    if (bgImage) {
        // Tính toán tỷ lệ hình ảnh và canvas
        const canvasRatio = mainCanvas.width / mainCanvas.height;
        const imageRatio = bgImage.width / bgImage.height;

        let drawWidth, drawHeight;

        if (canvasRatio > imageRatio) {
            // Canvas rộng hơn hình ảnh
            drawHeight = mainCanvas.height;
            drawWidth = bgImage.width * (drawHeight / bgImage.height);
        } else {
            // Canvas hẹp hơn hình ảnh
            drawWidth = mainCanvas.width;
            drawHeight = bgImage.height * (drawWidth / bgImage.width);
        }

        // Tính toán tọa độ để căn giữa hình ảnh
        const offsetX = (mainCanvas.width - drawWidth) / 2;
        const offsetY = (mainCanvas.height - drawHeight) / 2;

        // Vẽ hình ảnh lên canvas
        mainCtx.drawImage(bgImage, offsetX, offsetY, drawWidth, drawHeight);
    }
}

function drawTextFields() {
    coordinates.forEach(coord => {
        const li = document.querySelector(`li[data-field-id='${coord.id}']`);
        if (li) {
            mainCtx.font = coord.fontFamily;
            mainCtx.fillStyle = coord.fontColor;
            mainCtx.fillText(li.textContent, coord.x, coord.y);
        }
    });
}

function redrawCanvas() {
    mainCtx.clearRect(0, 0, mainCanvas.width, mainCanvas.height);
    drawBackgroundImage();
    drawTextFields();
}

// Add event listeners
addTextButton.addEventListener('click', () => {
    const newText = newTextInput.value.trim();

    if (newText === '') {
        alert('Please enter your text.');
        return;
    }

    const li = document.createElement('li');
    li.textContent = newText;
    li.className = 'text-center';
    li.draggable = true;
    li.setAttribute('data-field-id', Date.now());

    textHeader.appendChild(li);
    newTextInput.value = '';

    li.addEventListener('dragstart', (e) => {
        currentFieldId = e.target.getAttribute('data-field-id');
    });
});

document.querySelectorAll('#textHeader li').forEach(li => {
    li.addEventListener('dragstart', (e) => {
        currentFieldId = e.target.getAttribute('data-field-id');
    });
});

document.querySelectorAll('#fieldsContainer li').forEach(li => {
    li.addEventListener('dragstart', (e) => {
        currentFieldId = e.target.getAttribute('data-field-id');
    });
});

mainCanvas.addEventListener('dragover', (e) => {
    e.preventDefault();
});

mainCanvas.addEventListener('drop', (e) => {
    e.preventDefault();

    let rect = mainCanvas.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const li = document.querySelector(`li[data-field-id='${currentFieldId}']`);
    checkFontFamily();
    mainCtx.fillText(li.textContent, x, y);

    const text = li.textContent;

    coordinates.push({ id: currentFieldId, x, y, text, fontFamily, fontColor });
    redrawCanvas();
});

let isDragging = false;
let dragStart = null;
let draggedTextIndex = null;

mainCanvas.addEventListener('mousedown', (e) => {
    let rect = mainCanvas.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    coordinates.forEach((coord, index) => {
        const text = document.querySelector(`li[data-field-id='${coord.id}']`);
        const rectText = text.getBoundingClientRect();
        const textWidth = rectText.width;
        const textHeight = rectText.height;

        if (x >= coord.x && x <= coord.x + textWidth && y <= coord.y && y >= coord.y - textHeight) {
            isDragging = true;
            dragStart = { x, y };
            draggedTextIndex = index;
        }
    });
});

mainCanvas.addEventListener('mousemove', (e) => {
    if (isDragging) {
        let rect = mainCanvas.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const dx = x - dragStart.x;
        const dy = y - dragStart.y;

        coordinates[draggedTextIndex].x += dx;
        coordinates[draggedTextIndex].y += dy;

        dragStart = { x, y };

        redrawCanvas();
    }
});

mainCanvas.addEventListener('mouseup', () => {
    if (isDragging && draggedTextIndex !== null) {
        // Cập nhật lại tọa độ trong mảng coordinates sau khi thả chuột
        coordinates[draggedTextIndex].x = coordinates[draggedTextIndex].x;
        coordinates[draggedTextIndex].y = coordinates[draggedTextIndex].y;

        redrawCanvas();  // Vẽ lại canvas với các tọa độ mới
    }
    isDragging = false;
    draggedTextIndex = null;
});

document.getElementById('bgImageInput').addEventListener('change', (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        bgImage = new Image();

        bgImage.onload = function() {
            redrawCanvas();
        }
        bgImage.src = e.target.result;
    }
    reader.readAsDataURL(file);
});
// button reset
document.getElementById('resetAllButton').addEventListener('click', () => {
        coordinates.length = 0;
        redrawCanvas();
    });


            // ----------------------------------- generate button ------------------------------------


document.getElementById('generateAllButton').addEventListener('click', () => {
    var fieldValuesArray = {};
    let huy = 0;

    @foreach ($fieldValuesArray as $fieldId => $values)
        fieldValuesArray[{{ $fieldId }}] = @json($values);
        huy = {{ $fieldId }};
    @endforeach

    // Xóa thẻ cũ
    const existingCards = document.querySelectorAll('.card');
    existingCards.forEach(card => card.remove());

    for (let i = 0; i < fieldValuesArray[huy].length; i++) {
        const cardContainer = document.createElement('div');
        cardContainer.classList.add('card');

        const canvasClone = document.createElement('canvas');
        canvasClone.width = mainCanvas.width;  // Sử dụng kích thước của mainCanvas
        canvasClone.height = mainCanvas.height;
        const ctxClone = canvasClone.getContext('2d');

        // Vẽ hình nền trên canvas sao chép
        if (bgImage) {
            const canvasRatio = canvasClone.width / canvasClone.height;
            const imageRatio = bgImage.width / bgImage.height;

            let drawWidth, drawHeight;

            if (canvasRatio > imageRatio) {
                drawHeight = canvasClone.height;
                drawWidth = bgImage.width * (drawHeight / bgImage.height);
            } else {
                drawWidth = canvasClone.width;
                drawHeight = bgImage.height * (drawWidth / bgImage.width);
            }

            const offsetX = (canvasClone.width - drawWidth) / 2;
            const offsetY = (canvasClone.height - drawHeight) / 2;

            ctxClone.drawImage(bgImage, offsetX, offsetY, drawWidth, drawHeight);
        }

        ctxClone.textAlign = 'left';
        ctxClone.textBaseline = 'top';

        coordinates.forEach(coord => {
            if (fieldValuesArray[coord.id]) {
                ctxClone.font = coord.fontFamily;
                ctxClone.fillStyle = coord.fontColor;
                ctxClone.fillText(fieldValuesArray[coord.id][i], coord.x, coord.y);
            } else {
                ctxClone.font = coord.fontFamily;
                ctxClone.fillStyle = coord.fontColor;
                ctxClone.fillText(coord.text, coord.x, coord.y);
            }
        });

        // Thêm canvas vào thẻ card
        cardContainer.appendChild(canvasClone);
        // Thêm thẻ card vào trang
        document.body.appendChild(cardContainer);
        
    }
});

            printAllButton.addEventListener('click', function() {
                downloadAllCards();
            });

            function downloadAllCards() {
                const zip = new JSZip();
                const progress = document.querySelector('.progress');
                const progressBar = document.querySelector('.progress-bar');

                const cards = document.querySelectorAll('.card');
                const totalCards = cards.length;
                let completedCards = 0;

                // Hiển thị progress bar
                progress.style.display = 'block';

                // Tạo một promise cho mỗi thẻ card
                const promises = Array.from(cards).map((card, index) => {
                    return new Promise((resolve, reject) => {
                        const canvas = card.querySelector('canvas');
                        canvas.toBlob(blob => {
                            if (!blob) {
                                reject(new Error('Canvas.toBlob returned null'));
                                return;
                            }
                            zip.file(`card_${index + 1}.png`, blob);
                            completedCards++;
                            const percent = (completedCards / totalCards) * 100;
                            progressBar.style.width = `${percent}%`;
                            progressBar.textContent = `${Math.round(percent)}%`;
                            resolve();
                        }, 'image/png');
                    });
                });

                Promise.all(promises).then(() => {
                    zip.generateAsync({ type: 'blob' }).then(content => {
                        const link = document.createElement('a');
                        link.href = URL.createObjectURL(content);
                        link.download = 'Ivitation_cards_3.zip';
                        link.click();
                        progress.style.display = 'none';
                    });
                }).catch(error => {
                    console.error('Error processing images:', error);
                });
            }
        });

    </script>
</body>
</html>