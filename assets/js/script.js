function openNav(){
    document.getElementById('mySidebar').style.width = "250px";
    // document.getElementById('main-content').style.marginLeft = "250px";
    document.addEventListener('click', autoClose);

}
function closeNav(){
    document.getElementById('mySidebar').style.width = "0";
    // document.getElementById('main-content').style.marginLeft = "100px";
    document.removeEventListener('click', autoClose);
}
function autoClose(event){
    var isClickInside = document.getElementById('mySidebar').contains(event.target);
    var isClickOpen = document.getElementById('main').contains(event.target);
    if(!isClickInside && !isClickOpen){
        closeNav();
    }
}
function hideNot(){
    var not = document.querySelector('.not');
    not.classList.remove('show');
    not.classList.add('hide');
}
function showNot(notType, msg){
    var not = document.querySelector('.not');
    not.classList.add(notType);
    var icon = (notType === "succeeded") ? "fa-circle-check" : (notType === "failed") ? "fa-circle-xmark" : (notType === "warning") ? "fa-triangle-exclamation" : "";
    document.querySelector('.not > .fas').classList.add(icon);
    document.querySelector('.not .msg').innerText = msg;
    not.classList.add('showNot');
    not.classList.add('show');
    not.classList.remove('hide');
    setTimeout(hideNot, 3000);
}

function editBrand(id){
    var tdBrand = document.getElementById('tdBrand'+id);
    var oldBrand = tdBrand.innerText;
    var editButton = document.getElementById('editButton'+id);
    var deleteButton = document.getElementById('deleteButton'+id);

    tdBrand.innerHTML = "<input type='text' value='"+oldBrand+"' id='newBrand"+id+"'>"
    document.getElementById('newBrand'+id).focus();
    editButton.innerText = "Lưu";
    editButton.onclick = function(){
        updateBrand(id);
    };
    deleteButton.innerText = "Huỷ";
    deleteButton.onclick = function(){
        cancelEdit(id, tdBrand, oldBrand, editButton, deleteButton);
    };

    
}
function cancelEdit(id, tdBrand, oldBrand, editButton, deleteButton){
    tdBrand.innerHTML = oldBrand;
    editButton.innerText = "Sửa";
    editButton.onclick = function(){
        editBrand(id);
    }
    deleteButton.innerText = "Xoá";
    deleteButton.onclick = function(){
        deleteBrand(id);
    }
}
function setSOForm(wid, quantity){
    document.getElementById('oldQuantity').value=quantity;
    document.getElementById('so_ware_id').value=wid;
}
function setSIForm(wid, pid, price){
    document.getElementById('si_ware_id').value=wid;
    document.getElementById('pid').value=pid;
    document.getElementById('newPrice').value=price;
}