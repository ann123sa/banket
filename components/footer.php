<footer class="footer">
  <div class="container">
    <div class="footer-content">
      <div class="footer-logo">
        <img src="../img/logo3.png" alt="Logo">
      </div>
      <div class="footer-contact">
        <h3>Наши Контакты</h3>
        <p>Адрес: ул. Заозёрная, д.3в, г. Омск</p>
        <p>Email: info@banquethall.com</p>
        <p>Телефон: +7 (3812) 28-24-90</p>
      </div>
    </div>
    <div class="footer-center">
      <p>© «Заозерной» 2024</p>
    </div>
    <div class="footer-social">
      <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
      <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
      <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
    </div>
  </div>
</footer>

<script src="up.js"></script>
<script src="modal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>
<script>
 $('.slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: false, // Отключение кнопок навигации
});
$(document).ready(function() {
  $('#phone').inputmask("+7 (999) 999-99-99");
});
function showNotification() {
            alert("Заявка успешно принята!");
        }
</script>
</body>
</html>