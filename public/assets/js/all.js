window.addEventListener('load', function(event) {
    setTimeout(function() {
        hidePreloader()
    }, 500);

});

function handleDelete(e)
{

    var alert = confirm("Are you sure you want to delete?");
    showPreloader();

    // e.preventDefault();
    // var status = false;
    // showDeleteModal();
    // var accept = document.getElementById("deleteModalAccept");
    // var cancel =  document.getElementById("deleteModalCancel");
    // accept.addEventListener('click', ()=>{
    //     status = true;
    //     showPreloader();
    // })

    // cancel.addEventListener('click',()=>{
    //    hideDeleteModal();
    // })    
    // return e;
}



function handleSave()
{
    debugger
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