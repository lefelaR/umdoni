window.addEventListener('load', function(event) {
    ddebugger
    setTimeout(function() {
        hidePreloader()
    }, 500);

});

function handleDelete()
{
    confirm("are you sure you want to delete?");
    showPreloader();
}

function handleSave()
{
    showPreloader();
}

function showDeleteModal() {
  var modal = document.getElementById("deleteModal");
  modal.style.display = "block";
  modal.classList.add("show");
}

function showAvatarModal() {
    var modal = document.getElementById("avatarModal");
    modal.style.display = "block";
    modal.classList.add("show");
  }
  
  

function hideDeleteModal()
{
    var modal = document.getElementById("deleteModal");
    modal.style.display = "none";
    modal.classList.remove("show");
}

function showPreloader()
{
    var preloader = document.querySelector('.preloader');
    preloader.style.transition = 'opacity 0.5s';
    preloader.style.opacity = 1;
    preloader.style.display = 'block';
}

function hidePreloader()
{
    var preloader = document.querySelector('.preloader');
    preloader.style.transition = 'opacity 0.5s';
    preloader.style.opacity = 0;
    preloader.style.display = 'none';
}

function handleDrop(event) {
    event.preventDefault();
    handleFiles(event.dataTransfer.files);
}

function handleDragOver(event) {
    event.preventDefault();
    document.getElementById('dropArea').classList.add('dragover');
}

function handleDragLeave(event) {
    event.preventDefault();
    document.getElementById('dropArea').classList.remove('dragover');
}

function handleFiles(files) {
    document.getElementById('dropArea').classList.remove('dragover');
    const imageContainer = document.getElementById('imageContainer');
    imageContainer.innerHTML = ''; // Clear previous images
    for (const file of files) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const image = document.createElement('img');
            image.src = e.target.result;
            image.alt = file.name;
            image.classList.add('previewImage');
            imageContainer.appendChild(image);
        };
        reader.readAsDataURL(file);
    }
}

   // Clicking on the drop area triggers the hidden file input
   document.getElementById('dropArea').addEventListener('click', function () {
    document.getElementById('fileInput').click();
});

// Change event on the file input triggers file handling
document.getElementById('fileInput').addEventListener('change', function () {
    handleFiles(this.files);
});

document.getElementById('avatarModalCancel').addEventListener('click', ()=>{
    const image = document.getElementById('imageContainer');
    image.innerHTML = '';
    document.getElementById('avatarModal').style.display = "none"; 
})

document.getElementById('avatarModalAccept').addEventListener('click', ()=>{
    const user_id = document.getElementById('user_id').value; 
    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];
    if (!file) {
        alert('Please select an image file');
        return;
    }

    const formData = new FormData();
    formData.append('name', file);
    formData.append('user_id',user_id);
    fetch('http://localhost/umdoni/admin/user/updateImage', {
        method: 'POST',
        body: formData,
    })
    .then((response) => {
        debugger
        console.log("");
        })
    .then(data => {
        debugger
         alert('File uploaded successfully!');
    })
    .catch(error => {
        console.log("");
    });

})

