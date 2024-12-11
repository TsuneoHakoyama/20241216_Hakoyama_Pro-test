document.getElementById('image').addEventListener('change', function (event) {
        const file = event.target.files[0];
        document.getElementById('upload-file').textContent = file.name;
});