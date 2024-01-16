window.addEventListener('load', function(event) {
    setTimeout(function() {
        debugger
        hidePreloader()
    }, 500);

});

function handleDelete(e, id)
{

    confirm("are you sure you want to delete?");
    showPreloader();

    //   e.preventDefault();
//   showDeleteModal();
//   var status = false;
//   var accept = document.getElementById("deleteModalAccept");
//   var cancel = document.getElementById("deleteModalCancel");
//   const url = window.location.origin;
//   accept.addEventListener("click", () => {
//     status = true;
//     showPreloader();
//     var currentUrl = url+'/dashboard/projects/delete?id='+id;
//     fetch(currentUrl,{
//         method:'DELETE',
//         headers:{
//             'Content-Type': 'application/json'
//         }
//     }).then(response => {
//         debugger
//         if (!response.ok) {
//             throw new Error('Network response was not ok');
//         }
//         return response.json();
//     })
//  });
// });
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