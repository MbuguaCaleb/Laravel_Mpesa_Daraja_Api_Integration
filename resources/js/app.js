require('./bootstrap');


//generate access token request
document.getElementById('getAccessToken').addEventListener('click',(event)=>{
    event.preventDefault()
    axios.post('/get-token',{}).then((response)=>{
        console.log(response);
        document.getElementById('access-token').innerHTML = response.data
    }).catch((error)=>{
        console.log(error);
        
    })

})


document.getElementById('registerURLS').addEventListener('click',(event)=>{
    event.preventDefault()

    axios.post('register-urls',{}).then((response)=>{

     console.log(response.data)
    }).catch((error)=>{
        
     console.log(error)
    })


})