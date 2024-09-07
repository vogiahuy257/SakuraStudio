                    document.querySelector('#boldButton').textContent = data.boldButton;
                    document.querySelector('#italicButton').textContent = data.italicButton;
                    document.querySelector('#printAllButton').textContent = data.downloadAllButton;
                    document.querySelector('#generateAllButton').textContent = data.generateAllButton;
                    document.querySelector('label[for="Contact"]').textContent = data.contactListLabel;
                    document.querySelector('#contactSelect option[selected]').textContent = data.selectContactPlaceholder;
                    document.querySelector('label[for="bgImageInput"]').textContent = data.chooseBgImageLabel;
                    document.querySelector('#newTextInput').placeholder = data.enterTextPlaceholder;
                    document.querySelector('#addTextButton').textContent = data.addButton;
                    // Update alert message
                    document.querySelector('#alertNoText').textContent = data.alertNoText;