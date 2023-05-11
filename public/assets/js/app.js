document.getElementById('filter_company_id').addEventListener('change',function(){
    let companyID = this.value || this.options[this.selectedIndex].value;
    window.location.href = window.location.href.split('?')[0]+'?company_id=' + companyID;
})
