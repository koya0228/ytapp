'use strict';

(()=>{
    // フォームの追加
    const addFormBtn = document.getElementById('addUrlBox');
    addFormBtn.addEventListener('click', () => {
        const urlInputBoxes = document.querySelectorAll('#urlPostForm input[type="text"]');
        const urlInputBoxesNum = urlInputBoxes.length;

        if (urlInputBoxesNum < 6) {
            const newInputBox = document.createElement('div');

            const inputText = document.createElement('input');
            inputText.setAttribute('type', 'text');
            inputText.setAttribute('name', 'yturl[]');

            const deleteBtn = document.createElement('button');
            deleteBtn.setAttribute('class', 'delete-urlbox');
            deleteBtn.setAttribute('type', 'button');

            deleteBtn.addEventListener('click', () => {
                newInputBox.remove();
            });

            newInputBox.appendChild(inputText);
            newInputBox.appendChild(deleteBtn);
            addFormBtn.before(newInputBox);
        }
    });
})();
