let filterCompany = document.getElementById('filter_company_id');
if(filterCompany){
    filterCompany.addEventListener('change',function(){
        let companyID = this.value || this.options[this.selectedIndex].value;
        window.location.href = window.location.href.split('?')[0]+'?company_id=' + companyID;
    });
}

let btnDelete = document.querySelectorAll('.btn-delete');
if(btnDelete){
    btnDelete.forEach((button)=>{
        button.addEventListener('click', function(event){
            event.preventDefault();
            if(confirm("Are you sure to delete this item?")){
                let action = this.getAttribute('href');
                let form = document.getElementById('form-delete');
                form.setAttribute('action', action);
                console.log(form);
                form.submit();
            }
        })
    });
}

let btnClear=document.getElementById('btn-clear');
if(btnClear){
    btnClear.addEventListener('click',()=>{
        let input = document.getElementById('search'),
        select = document.getElementById('filter_company_id');
        if(input) input.value = "";
        if(select) select.selectedIndex = 0;
        window.location.href = window.location.href.split('?')[0];
    });
}


const toggleClearBtn = () => {
    let query = location.search,
    pattern = /[?&]search=/,
    button = document.getElementById('btn-clear');

    if(button==undefined) return true;
    if(pattern.test(query)){
        button.style.display ="block";
    }
    else{
        button.style.display ="none";
    }
}
toggleClearBtn();

$("#add-new-group").hide();
    $('#add-group-btn').click(function () {
        $("#add-new-group").slideToggle(function() {
            $('#new_group').focus();
        });
        return false;
    });
