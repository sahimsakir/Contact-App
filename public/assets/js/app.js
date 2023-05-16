document.getElementById('filter_company_id').addEventListener('change',function(){
    let companyID = this.value || this.options[this.selectedIndex].value;
    window.location.href = window.location.href.split('?')[0]+'?company_id=' + companyID;
});
document.querySelectorAll('.btn-delete').forEach((button)=>{
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
document.getElementById('btn-clear').addEventListener('click',()=>{
    let input = document.getElementById('search'),
    select = document.getElementById('filter_company_id');
    input.value = "";
    select.selectedIndex = 0;
    window.location.href = window.location.href.split('?')[0];
});

const toggleClearBtn = () => {
    let query = location.search,
    pattern = /[?&]search=/,
    button = document.getElementById('btn-clear');
    if(pattern.test(query)){
        button.style.display ="block";
    }
    else{
        button.style.display ="none";
    }
}
toggleClearBtn();
