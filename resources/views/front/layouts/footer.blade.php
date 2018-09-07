<footer id="footer" class="footer pb-0" data-bg-img="/front/images/footer-bg.png" data-bg-color="#25272e">
    <div class="container pb-20">
        <div class="row multi-row-clearfix">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark"> <img alt="" src="/front/images/logo-wide-white.png">
                    <p class="font-12 mt-20 mb-10">CharityFund is a library of Crowdfunding and Charity templates with predefined elements which helps you to build your own site. Lorem ipsum dolor sit amet consectetur.</p>
                    <a class="text-gray font-12" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
                    <ul class="styled-icons icon-dark mt-20">
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="#" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a href="#" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a href="#" data-bg-color="#05A7E3"><i class="fa fa-skype"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a href="#" data-bg-color="#C22E2A"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Pages</h5>
                    <ul class="list-border list theme-colored angle-double-right">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Donor Privacy Policy</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Copyright Notice</a></li>
                        <li><a href="#">Media Center</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Quick Links</h5>
                    <ul class="list-border list theme-colored angle-double-right">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Donor Privacy Policy</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Copyright Notice</a></li>
                        <li><a href="#">Media Center</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Quick Contact</h5>
                    <ul class="list-border">
                        <li><a href="#">+(012) 345 6789</a></li>
                        <li><a href="#">hello@yourdomain.com</a></li>
                        <li><a href="#" class="lineheight-20">121 King Street, Melbourne Victoria 3000, Australia</a></li>
                    </ul>
                    <p class="text-white mb-5 mt-15">Subscribe to our newsletter</p>
                    <form id="footer-mailchimp-subscription-form" class="newsletter-form mt-10">
                        <label class="display-block" for="mce-EMAIL"></label>
                        <div class="input-group">
                            <input type="email" value="" name="EMAIL" placeholder="Your Email"  class="form-control" data-height="37px" id="mce-EMAIL">
                            <span class="input-group-btn">
                    <button type="submit" class="btn btn-colored btn-theme-colored m-0"><i class="fa fa-paper-plane-o text-white"></i></button>
                </span>
                        </div>
                    </form>
                    <!-- Mailchimp Subscription Form Validation-->
                    <script type="text/javascript">
                        $('#footer-mailchimp-subscription-form').ajaxChimp({
                            callback: mailChimpCallBack,
                            url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
                        });

                        function mailChimpCallBack(resp) {
                            // Hide any previous response text
                            var $mailchimpform = $('#footer-mailchimp-subscription-form'),
                                $response = '';
                            $mailchimpform.children(".alert").remove();
                            if (resp.result === 'success') {
                                $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                            } else if (resp.result === 'error') {
                                $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                            }
                            $mailchimpform.prepend($response);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-theme-colored p-20">
        <div class="row text-center">
            <div class="col-md-12">
                <p class="text-white font-11 m-0">Copyright &copy;2015 ThemeMascot. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>