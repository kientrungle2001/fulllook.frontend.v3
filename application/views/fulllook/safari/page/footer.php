<div id="footer" class="full">
	<div class="footer-gradient">
		<div class="footer-content container">
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<img class="mt-40" src="http://tdn.nextnobels.com/assets/images/logofooter2.png" />
					<div class="footer-text">
						Địa chỉ: Nhà số 6, Ngõ 115 Nguyễn Khang, Cầu Giấy, Hà Nội<br/>
						Website: Nextnobels.com<br/>
						Điện thoại: (04)8585 2525<br/>
						Hotline: 0936 738 986
					</div>
				</div>
				<div class="col-xs-12 col-md-2">
					<div class="link-footer">
						<a class="text-uppercase" href="#">Về chúng tôi </a>
						<a href="http://nextnobels.com/ho-so-cong-ty">Hồ sơ công ty </a>
						<a href="http://nextnobels.com/tam-nhin-su-menh-cong-ty">Tầm nhìn, sứ mệnh </a>
						<a href="http://nextnobels.com/nguoi-sang-lap-cong-ty">Người sáng lập</a>
					</div>
					
				</div>
				<div class="col-xs-12 col-md-2">
					<div class="link-footer">
						<a class="text-uppercase" href="#">Truyền thông </a>
						<a href="http://nextnobels.com/bao-chi">Báo chí </a>
						<a href="http://nextnobels.com/fulllook-phan-mem-hoc-song-ngu-anh-viet">Truyền hình </a>
						<a href="#">Full Look</a>
					</div>	
				</div>
				<div class="col-xs-12 col-md-2">
					<div class="link-footer">
						<a class="text-uppercase" href="#">Tin tức </a>
						<a href="http://nextnobels.com/tin-cong-ty">Tin công ty </a>
						<a href="#">Sự kiện nổi bật </a>
						<a href="http://nextnobels.com/thoi-su-hoc-duong">Thời sự học đường</a>
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
$showPopup = true;
if($showPopup): ?>
<div class="modal" id="bannerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-uppercase text-center m-0" style=" font-size: 32px; width: 100%; color: #19c3c1;font-family: iCiel;">Next Nobels</h5>
        <button onclick="closePopup();" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="relative">
									<a href="http://tdn.thitai.vn/contest/news/203">
										<img src="/assets/images/popup-tdn.png" class="img-fluid img-responsive" alt="">
									</a>
								</div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<script>
<?php if($showPopup): ?>
		jQuery(document).ready(function() {
			if(sessionStorage.getItem('closePopup') != '1') {
				if(window.location.pathname == '' || window.location.pathname == '/' )
				jQuery('#bannerModal').modal('show');
			}
		});
		function closePopup() {
			jQuery('#bannerModal').modal('hide');
			sessionStorage.setItem('closePopup', '1');
		}
		<?php endif;?>
</script>

<?php if(0): ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/56d905db5ef21b26679a3cfc/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php endif;?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63651240-1', 'auto');
  ga('send', 'pageview');

</script>