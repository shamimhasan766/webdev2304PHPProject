             </div>
             </div>
             <!--**********************************
            Content body end
        ***********************************-->
             <!--**********************************
            Footer start
        ***********************************-->

             <!--**********************************
            Footer end
        ***********************************-->

             <!--**********************************
           Support ticket button start
        ***********************************-->

             <!--**********************************
           Support ticket button end
        ***********************************-->


             </div>
             <!--**********************************
        Main wrapper end
    ***********************************-->

             <!--**********************************
        Scripts
    ***********************************-->
             <!-- Required vendors -->
             <script src="/class11/sage/assets/vendor/global/global.min.js"></script>
             <script src="/class11/sage/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
             <script src="/class11/sage/assets/vendor/chart.js/Chart.bundle.min.js"></script>
             <script src="/class11/sage/assets/js/custom.min.js"></script>
             <script src="/class11/sage/assets/js/deznav-init.js"></script>
             <script src="/class11/sage/assets/vendor/owl-carousel/owl.carousel.js"></script>
             <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
             <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
             <script type="text/javascript" src="/class11/sage/includes/bootstrap.bundle.min.js"></script>
             <script src="/class11/sage/assets/js/axios.min.js"></script>
             

             <!-- Chart piety plugin files -->
             <script src="/class11/sage/assets/vendor/peity/jquery.peity.min.js"></script>

             <!-- Apex Chart -->
             <script src="/class11/sage/assets/vendor/apexchart/apexchart.js"></script>

             <!-- Dashboard 1 -->
             <script src="/class11/sage/assets/js/dashboard/dashboard-1.js"></script>
             <script>
             	function carouselReview() {
             		/*  testimonial one function by = owl.carousel.js */
             		jQuery('.testimonial-one').owlCarousel({
             			loop: true,
             			autoplay: true,
             			margin: 30,
             			nav: false,
             			dots: false,
             			left: true,
             			navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
             			responsive: {
             				0: {
             					items: 1
             				},
             				484: {
             					items: 2
             				},
             				882: {
             					items: 3
             				},
             				1200: {
             					items: 2
             				},

             				1540: {
             					items: 3
             				},
             				1740: {
             					items: 4
             				}
             			}
             		})
             	}
             	jQuery(window).on('load', function() {
             		setTimeout(function() {
             			carouselReview();
             		}, 1000);
             	});
             </script>
             </body>

             </html>