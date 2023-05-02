const select = document.getElementById('tName');

select.addEventListener('change', function handleChange(event){
    var value = select.value;

    $.ajax({
        type: 'POST',
        url: 'request.php',
        data: {name:value} 
    })
})
