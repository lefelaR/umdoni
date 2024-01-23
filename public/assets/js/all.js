window.addEventListener("load", function (event) {
  setTimeout(function () {
    hidePreloader();
  }, 500);
});

function handleDelete() {
  confirm("are you sure you want to delete?");
  showPreloader();
}

function handleSave() {
  debugger
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

function hideAvatarModal() {
  var modal = document.getElementById("avatarModal");
  modal.style.display = "none";
  modal.classList.remove("show");
}

function showPasswordModal() {
  var modal = document.getElementById("passwordModal");
  modal.style.display = "block";
  modal.classList.add("show");
}

function hidePasswordModal() {
  var modal = document.getElementById("passwordModal");
  modal.style.display = "none";
  modal.classList.remove("show");
}

function hideDeleteModal() {
  var modal = document.getElementById("deleteModal");
  modal.style.display = "none";
  modal.classList.remove("show");
}

function showPreloader() {
  var preloader = document.querySelector(".preloader");
  preloader.style.transition = "opacity 0.5s";
  preloader.style.opacity = 1;
  preloader.style.display = "block";
}

function hidePreloader() {
  var preloader = document.querySelector(".preloader");
  preloader.style.transition = "opacity 0.5s";
  preloader.style.opacity = 0;
  preloader.style.display = "none";
}

function handleDrop(event) {
  event.preventDefault();
  handleFiles(event.dataTransfer.files);
}

function handleDragOver(event) {
  event.preventDefault();
  document.getElementById("dropArea").classList.add("dragover");
}

function handleDragLeave(event) {
  event.preventDefault();
  document.getElementById("dropArea").classList.remove("dragover");
}

function handleFiles(files) {
  document.getElementById("dropArea").classList.remove("dragover");
  const imageContainer = document.getElementById("imageContainer");
  imageContainer.innerHTML = ""; // Clear previous images
  for (const file of files) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const image = document.createElement("img");
      image.src = e.target.result;
      image.alt = file.name;
      image.classList.add("previewImage");
      imageContainer.appendChild(image);
    };
    reader.readAsDataURL(file);
  }
}

// Clicking on the drop area triggers the hidden file input
document.getElementById("dropArea").addEventListener("click", function () {
  document.getElementById("fileInput").click();
});

// Change event on the file input triggers file handling
document.getElementById("fileInput").addEventListener("change", function () {
  handleFiles(this.files);
});

document.getElementById("avatarModalCancel").addEventListener("click", () => {
  const image = document.getElementById("imageContainer");
  image.innerHTML = "";
  document.getElementById("avatarModal").style.display = "none";
});

document.getElementById("avatarModalAccept").addEventListener("click", () => {
  const user_id = document.getElementById("user_id").value;
  const fileInput = document.getElementById("fileInput");
  const file = fileInput.files[0];
  if (!file) {
    alert("Please select an image file");
    return;
  }

  showPreloader();
  const formData = new FormData();
  formData.append("name", file);
  formData.append("user_id", user_id);

  const currentURL = window.location.href;
  const stripped = currentURL.substring(0, currentURL.lastIndexOf("/"));

  fetch(stripped + "/updateImage", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      Toastify({
        text: "Profile image has been Saved",
        duration: 3000,
        gravity: "bottom",
        position: "left",
        backgroundColor: "#4fbe87",
      }).showToast();
      hidePreloader();
      hideAvatarModal();
    })
    .catch((error) => {
      console.log("");
    });
});

const updatePassword = () => {
  const password = document.getElementById("updatepassword").value;
  const confirm = document.getElementById("confirmupdatepassword").value;
  const currentURL = window.location.href;
  const stripped = currentURL.substring(0, currentURL.lastIndexOf("/"));
  const url = stripped + "/updatePassword";

  fetch(url, {
    method: "POST",
    body: formData,
  }).then(() => {
    debugger;
  });
  // var isValid = validatePassword();
};


const Toast = (type, message) =>{
    Toastify({
        text: message,
        className: type ,
        duration: 3000,
        gravity: "bottom",
        position: "left",
      }).showToast();

}



  // var userSwitch = document.getElementById('userStatusSwitch');
  // userSwitch.addEventListener("change", ()=>{
  //   var locked = userSwitch.checked;


  //   const formData = new FormData();
  //   formData.append("locked", locked);
  //   formData.append("user_id", user_id);

  //   const currentURL = window.location.href;
  //   const stripped = currentURL.substring(0, currentURL.lastIndexOf("/"));
  //   fetch( stripped+'/manageuser', {
  //     method: "post",
  //     body: formData,
  //   })
  //     .then((response) => {
  //     //   Swal.fire({
  //     //     icon: "success",
  //     //     title: "Success"
  //     // })
    
  //     Toastify({
  //       text: "Status has been changed",
  //       duration: 3000,
  //       gravity: "bottom",
  //       position: "left",
  //       backgroundColor: "#4fbe87",
  //     }).showToast();
  //     location.reload();
  //     }
  //     )
  //     .catch((err) => console.log(err));

  // })



const hideStatusModal = () =>{
  var modal = document.getElementById("userStatusModal");
  modal.style.display = "";
  modal.classList.remove("show");
}


document.getElementById("userStatusModalCancel").addEventListener("click", function () {
  hideStatusModal();
});


