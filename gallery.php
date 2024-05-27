<?php
    include 'components/core.php';
    
    include 'components/header2.php';

?>
<style>
  body {
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
  }

  .container_gal {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }

  h1 {
    text-align: center;
    color: #e7cba7;
    margin-bottom: 30px;
    font-size: 36px;
  }

  .gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-gap: 20px;
    justify-content: center;
  }

  .gallery img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, filter 0.3s ease;
  }

  .gallery img:hover {
    transform: scale(1.05);
    filter: brightness(80%);
  }

  .gallery img::after {
    content: attr(alt);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 18px;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .gallery img:hover::after {
    opacity: 1;
  }
</style>
<div class="container_gal">
  <h1>Фотогалерея</h1>
  <div class="gallery">
    <?php 
      $image = mysqli_query($mysqli,"SELECT * FROM `gallery` ");
      while( $img = mysqli_fetch_assoc( $image) )
                {
    ?>
    <img src="img/<?=$img['image'];?>" alt="Фото банкетного зала">
    <?php
                }
    ?>
  </div>
</div>
<?php
    include 'components/footer.php';
?>