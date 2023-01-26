<?php get_header('home', 'index'); ?>
<section>
    <div class="wraper">
        <div class="text">
            <p>Bienvenue à agenda voiture. Ici vous pourrez gérer vos véhicules. Vous pouvez ajouter ou supprimer des véhicules de votre liste comme vous le souhaitez. Pour que vous compreniez mieux, vous pourrez visualiser les dernières interventions réalisées sur votre (ou vos si vous en possédez plusieurs) véhicule, mais aussi celles qui sont à venir. Mais pas seulement, vous pourrez aussi observer vos dépenses annuelles et les comparer aux années précédentes. Il suffira de remplir régulièrement les informations nécessaires, telles que les frais d’entretien, les factures, le kilométrage, etc.</p>
        </div>
        <div class="containerMain">
            <div class="container">
                <div class="card-box">
                    <div class="card" id="image1">
                        <div class="front">
                            <img src="/src/assets/images/index_alert.png" width="100px" height="133px" alt="">
                        </div>
                        <div class="front back" id='image2'>
                            <img src="/src/assets/images/text_alerts.png" width="100px" height="133px">
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <div class="card">
                        <div class="front">
                            <img src="/src/assets/images/statistics_index.png" width="100px" height="133px" alt="">
                        </div>
                        <div class="front back">
                            <img src="/src/assets/images/text_statistics.png" width="100px" height="133px">
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <div class="card">
                        <div class="front">
                            <img src="/src/assets/images/history_index.png" width="100px" height="133px" alt="">
                        </div>
                        <div class="front back">
                            <img src="/src/assets/images/text_history.png" width="100px" height="133px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card-box">
                    <div class="card">
                        <div class="front">
                            <img src="/src/assets/images/invoice_index.png" width="100px" height="133px" alt="">
                        </div>
                        <div class="front back">
                            <img src="/src/assets/images/text_invoice.png" width="100px" height="133px">
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <div class="card">
                        <div class="front">
                            <img src="/src/assets/images/index_car.png" width="100px" height="133px" alt="">
                        </div>
                        <div class="front back">
                            <img src="/src/assets/images/text_car.png" width="100px" height="133px">
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <div class="card" id="image6">
                        <div class="front">
                            <img src="/src/assets/images/frais.png" width="100px" height="133px" alt="">
                        </div>
                        <div class="front back">
                            <img src="/src/assets/images/text_value.png" width="100px" height="133px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type='text/javascript' src="src/assets/js/script.js"></script>

<!-- 

const image1 = ()=>{
    let turnAngle= 180;
    let i1 = document.getElementById("image1");
    i1.setAttribute("style", "transform: rotatey(" + turnAngle + "deg)");
  turnAngle += 180;
  
  console.log(turnAngle++); 
}

// clearInterval(image1);


const image2 = ()=>{
    let turnAngle= 360;
    let i1 = document.getElementById("image1");
    i1.setAttribute("style", "transform: rotatey(" + turnAngle + "deg)");
    turnAngle = turnAngle + 180;
    console.log(turnAngle); 
}

setInterval(image1, 6000); 
setInterval(image2, 12000); 
// setInterval(() => {
//     let k=360;
//     let i6 = document.getElementById("image2");
//     // k += 180;
//     i6.style.transform = "rotatey(" + k + "deg)";
//     i6.style.transitionDuration = "0.9s"
    
// }, 5000);
 -->


<!-- </script> -->
<?php get_footer('index'); ?>