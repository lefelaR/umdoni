window.addEventListener("load", function (event) {
  setTimeout(function () {
    hidePreloader();
  }, 500);
});

function handleDelete(e, id) {
  var confirmation = confirm("Are you sure you want to delete?");
  if(confirmation === true){
    showPreloader();
  }else{
    e.preventDefault();
    e.stopPropagation();
    Toast('danger','Delete was cancelled');
    return;
  }
 
}

function handleSave() {
  showPreloader();
}


function handleDownload()
{
  const currentURL = window.location.href;
  const stripped = currentURL.substring(0, currentURL.lastIndexOf("/"));
  fetch(stripped + "/download", {
    method: "GET",
  })
    .then((res) => {
      Toast("success", "Download has been generated");
    })
    .catch((err) => {
      Toast("danger", "Failled to generate download");
    });
}


function handleValidate(){
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
      Toast("success","Profile image has been updated")
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
  stripped = stripUrl();
  const url = stripped + "/updatePassword";
  fetch(url, {
    method: "POST",
    body: formData,
  }).then(() => {
    debugger;
  });
  // var isValid = validatePassword();
};

const Toast = (type, message) => {
  if (type == "success") {
    bgColor = "#4fbe87";
  } else if (type == "danger") {
    bgColor = "#be4f4f";
  }
  else if(type="warn")
  {
    bgColor = "#bea04f";
  }
  Toastify({
    text: message,
    className: type,
    duration: 3000,
    gravity: "bottom",
    position: "left",
    backgroundColor: bgColor,
  }).showToast();

};

const hideStatusModal = () => {
  var modal = document.getElementById("userStatusModal");
  modal.style.display = "";
  modal.classList.remove("show");
};

document
  .getElementById("userStatusModalCancel")
  .addEventListener("click", function () {
    hideStatusModal();
  });

const handlePost = async (url = "", data = {}) => {
  var result;
  await fetch(url, {
    method: "POST",
    body: data,
  })
    .then((response) => {
      result = response;
    })
    .catch((error) => {
      throw error;
    });
  return result;
};

const handleGet = async (url="") =>{
  var result;
  await fetch(url,{
    method: "GET",
  })
  .then((response)=>{
    result = response;
  }).catch((error)=>{
    result = error;
  })
return result;
}

const handleUpdate = async (url ='', data='') => {}

function stripUrl(){
  const currentURL = window.location.href;
  const stripped = currentURL.substring(0, currentURL.lastIndexOf("/"));
  return stripped;
}


