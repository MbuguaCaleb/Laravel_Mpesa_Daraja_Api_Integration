require("./bootstrap");

//generate access token request
document.getElementById("getAccessToken").addEventListener("click", (event) => {
    event.preventDefault();
    axios
        .post("/get-token", {})
        .then((response) => {
            console.log(response);
            document.getElementById("access-token").innerHTML = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
});

document.getElementById("registerURLS").addEventListener("click", (event) => {
    event.preventDefault();

    axios
        .post("register-urls", {})
        .then((response) => {
            if (response.data.ResponseDescription) {
                document.getElementById("response").innerHTML =
                    response.data.ResponseDescription;
            } else {
                console.log(response.data)
                document.getElementById("response").innerHTML =
                    response.data.errorMessage;
            }
        })
        .catch((error) => {
            console.log(error);
        });
});


// document.getElementById('simulate').addEventListener('click',(event)=>{
//     event.preventDefault();

//     const requestBody ={
//         amount:document.getElementById('amount').value,
//         account:document.getElementById('account').value
//     }

//     console.log(requestBody)

//     axios.post('/simulate',requestBody)
//     .then((response)=>{
//         console.log(response.data)
//     }).catch((error) => console.log(error))

// })