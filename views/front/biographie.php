<?php
ob_start();
?>

 <div id="container_biographie" class="container text-secondary border border-bg-dark bg-white mt-5 pl-5 pr-5 pb-5 mb-5 shadow-lg p-3 mb-5 bg-dark rounded text">
        <div class="bg-dark text-light ">
            <h1 id="title_biographie" class="text-center mt-5 pt-5 ">Biographie de Jean Forteroch</h1>
            <p class="text-center pb-5">Mon histoire en quelques lignes</p>
            <img id="imgbiographie" class="simg" src="public/images/111.jpg"> 
        </div>
        <hr id="hr_biographie" class="mt-5">
        <h2 id="second_titlebiographie" class="text-center text-dark">Qui suis-je ?</h2>
        <div id="text_biographie">
        <p class= mt-5> Bonjour lorem ipsum Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Nam eius, consequuntur obcaecati necessitatibus voluptatum hic quam numquam rerum
            provident? Odit consecteturmagnam aut. Quas temporibus magni a quibusdam? Maiores,
            nisi!sit amet consectetur adipisicing elit.Nam eius, consequuntur obcaecati necessitatibus
            voluptatum hic quam numquam rerum provident? Odit consecteturmagnam aut. Quas temporibus magni 
            a quibusdam? Maiores, nisi! hic quam numquam rerum provident temporibus magni a quibusdam. 
            Nam eius, consequuntur obcaecati necessitatibus voluptatum hic quam numquam rerum
        </p>
        <p>
            provident? Odit consecteturmagnam aut. Quas temporibus magni a quibusdam? Maiores,
            nisi!sit amet consectetur adipisicing elit.Nam eius, consequuntur obcaecati necessitatibus
            voluptatum hic quam numquam rerum provident? Odit consecteturmagnam aut. Quas temporibus magni 
            a quibusdam? Maiores, nisi! hic quam numquam rerum provident temporibus magni a quibusdam. 
            Nam eius, consequuntur obcaecati necessitatibus voluptatum hic quam numquam rerum
            provident? Odit consecteturmagnam aut. Quas temporibus magni a quibusdam? Maiores,
            nisi!sit amet consectetur adipisicing elit.Nam eius, consequuntur obcaecati necessitatibus
            voluptatum hic quam numquam rerum provident? Odit consecteturmagnam aut. Quas temporibus magni 
            a quibusdam? Maiores, nisi! hic quam numquam rerum provident temporibus magni a quibusdam. 
            Nam eius, consequuntur obcaecati necessitatibus voluptatum hic quam numquam rerum
            provident? Odit consecteturmagnam aut. Quas temporibus magni a quibusdam? Maiores,
            nisi!sit amet consectetur adipisicing elit.Nam eius, consequuntur obcaecati necessitatibus
            voluptatum hic quam numquam rerum provident? Odit consecteturmagnam aut. Quas temporibus magni 
            a quibusdam? Maiores, nisi! hic quam numquam rerum provident temporibus magni a quibusdam. 
        </p>

        <p>
            provident? Odit consecteturmagnam aut. Quas temporibus magni a quibusdam? Maiores,
            nisi!sit amet consectetur adipisicing elit.Nam eius, consequuntur obcaecati necessitatibus
            voluptatum hic quam numquam rerum provident? Odit consecteturmagnam aut. Quas temporibus magni 
            a quibusdam? Maiores, nisi! hic quam numquam rerum provident temporibus magni a quibusdam. 
            Nam eius, consequuntur obcaecati necessitatibus voluptatum hic quam numquam rerum
            provident? Odit consecteturmagnam aut. Quas temporibus magni a quibusdam? Maiores,
            nisi!sit amet consectetur adipisicing elit.Nam eius, consequuntur obcaecati necessitatibus
            voluptatum hic quam numquam rerum provident? Odit consecteturmagnam aut. Quas temporibus magni 
            a quibusdam? Maiores, nisi! hic quam numquam rerum provident temporibus magni a quibusdam. 
            Nam eius, consequuntur obcaecati necessitatibus voluptatum hic quam numquam rerum
            provident? Odit consecteturmagnam aut. Quas temporibus magni a quibusdam? Maiores,
            nisi!sit amet consectetur adipisicing elit.Nam eius, consequuntur obcaecati necessitatibus
            voluptatum hic quam numquam rerum provident? Odit consecteturmagnam aut. Quas temporibus magni 
            a quibusdam? Maiores, nisi! hic quam numquam rerum provident temporibus magni a quibusdam. 
        </p>
        </div>

    </div>


<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>