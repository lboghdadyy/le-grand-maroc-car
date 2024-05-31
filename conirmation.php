<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
    background-image: #fff;
    min-height: 100vh;
    vertical-align: middle;
    display: flex;
    
}
.card{
    margin: auto;
    width: 600px;
    padding: 3rem 3.5rem;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.mt-50 {
    margin-top: 50px
}

.mb-50 {
    margin-bottom: 50px
}


@media(max-width:767px){
    .card{
        width: 90%;
        padding: 1.5rem;
    }
}
@media(height:1366px){
    .card{
        width: 90%;
        padding: 8vh;
    }
}
.card-title{
    font-weight: 700;
    font-size: 2.5em;
}
.nav{
    display: flex;
}
.nav ul{
    list-style-type: none;
    display: flex;
    padding-inline-start: unset;
    margin-bottom: 6vh;
}
.nav li{
    padding: 1rem;
}
.nav li a{
    color: black;
    text-decoration: none;
}
.active{
    border-bottom: 2px solid black;
    font-weight: bold;
}

input{
    border: none;
    outline: none;
    font-size: 1rem;
    font-weight: 600;
    color: #000;
    width: 100%;
    min-width: unset;
    background-color: transparent;
    border-color: transparent;
    margin: 0;
}
form a{
    color:grey;
    text-decoration: none;
    font-size: 0.87rem;
    font-weight: bold;
}
form a:hover{
    color:grey;
    text-decoration: none;
}
form .row{
    margin: 0;
    overflow: hidden;
}
form .row-1{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    overflow: hidden;
}
form .row-2{
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem;
}
form .row .row-2{
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem;
}
form .row .col-2,.col-7,.col-3{
    display: flex;
    align-items: center;
    text-align: center;
    padding: 0 1vh;
}
form .row .col-2{
    padding-right: 0;
}

#card-header{
    font-weight: bold;
    font-size: 0.9rem;
}
#card-inner{
    font-size: 0.7rem;
    color: gray;
}
.three .col-7{
    padding-left: 0;
}
.three{
    overflow: hidden;
    justify-content: space-between;
}
.three .col-2{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    width: fit-content;
    overflow: hidden; 
}
.three .col-2 input{
    font-size: 0.7rem;
    margin-left: 1vh;
}
.btn{
    width: 100%;
    background-color: #e23939;
    border-color: #e23939;
    color: white;
    justify-content: center;
    padding: 2vh 0;
    margin-top: 3vh;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
input:focus::-webkit-input-placeholder { 
    color:transparent; 
}
input:focus:-moz-placeholder { 
    color:transparent; 
} 
input:focus::-moz-placeholder { 
    color:transparent; 
} 
input:focus:-ms-input-placeholder { 
    color:transparent; 
}
.hidden{
    display: none;
    opacity: 0;
}
    </style>    
</head>
<body>
   
   
<div class="card mt-50 mb-50">
            <div class="card-title mx-auto">
                Settings
            </div>
            <div class="nav">
                <ul class="mx-auto">
                    <li id="mastercardlist" class="active"><a href="#" onclick="mastercard()">Visa carte</a></li>
                    <li id="paypallist"><a href="#" onclick="paypal()">Paypal</a></li>
                </ul>
            </div>
            <form>
                <div id="visacarte">
                <span id="card-header">Ajouter une novvelle carte:</span>
                <div class="row-1">
                    <div class="row row-2">
                        <span id="card-inner">Nom du titulaire de la carte</span>
                    </div>
                    <div class="row row-2">
                        <input type="text" >
                    </div>
                </div>
                <div class="row three">
                    <div class="col-7">
                        <div class="row-1">
                            <div class="row row-2">
                                <span id="card-inner">Numéro de carte</span>
                            </div>
                            <div class="row row-2">
                                <input type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <input type="text" placeholder="Exp. date">
                    </div>
                    <div class="col-2">
                        <input type="text" placeholder="CVV">
                    </div>
                </div>
                <button class="btn d-flex mx-auto"><b>Add card</b></button>
                </div>
                <div class="hidden" id='paypal'>
                    <span id="card-header">Paypal</span>
                    <div class="row-1">
                        <div class="row row-2">
                            <label>ajouter votre paypal adress</label>
                            <input type="email" placeholder='paypal adress' required/>
                            <button class="btn d-flex mx-auto" style="background: #0070ba;"><b>ajouter  </b></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
<script>
    function paypal() {
    var visacarte = document.getElementById('visacarte');
    var paypalform = document.getElementById('paypal');
    var listmc =document.getElementById('mastercardlist');
    var listp =document.getElementById('paypallist')
    visacarte.classList.add('hidden');
    listmc.classList.remove('active');
    paypalform.classList.remove('hidden');
    listp.classList.add('active');
    }
    function mastercard(){
        var visacarte =document.getElementById('visacarte');
    var paypalform =document.getElementById('paypal');
    var listmc =document.getElementById('mastercardlist');
    var listp =document.getElementById('paypallist')
    visacarte.classList.remove('hidden');
    paypalform.classList.add('hidden');
    listmc.classList.add('active');
    listp.classList.remove('active');
    }
</script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '10.00' 
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                console.log('Payment completed successfully');
            });
        },
        onError: function(err) {
            // Implement error handling logic
            console.error('An error occurred:', err);
        }
    }).render('#paypal-button');

</script>
<script src="https://www.paypal.com/sdk/js?client-id=AVxOy90JKaM55Rdw4lxs4cZhUv0zvXfnSb2-Kr1ziRsWu7mK0Oq6AVGuvyqq-ikVn-sbnTjqYNnl5rre"></script>
<script src="assets/js/apipaypal.js"></script>
</body>
</html>