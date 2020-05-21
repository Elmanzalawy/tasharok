{{-- <footer id="main-footer">
    <div class="container">
        <div class="row">
            <div class="col md-6">
                <h6>وسائل التواصل</h6>
                    <a href="#" target="_blank"><span class="fa fa-facebook"></span> </a>
                    <a href="#" target="_blank"><span class="fa fa-twitter"></span> </a>
                    <a href="#" target="_blank"><span class="fa fa-youtube"></span> </a>
            </div>

            <div class="col md-6">
                <h6>معلومات أخرى</h6>
                <ul id="contact-us" class="list-unstyled">
                    @if(!Auth::guest())
                    <li>
                        <a href="#" id="contact-family" data-toggle="modal" data-target="#contact-us-modal">تواصل معنا</a>
                    </li>
                    @endif
                    <li>
                        &copy; <?php echo idate('Y'); ?>  جميع الحقوق محفوظة.
                    </li>
                </ul>

            </div>

        </div>
    </div>
</footer> --}}
     <!--CONTACT US MODAL-->
     <div class="modal fade" id="contact-us-modal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تواصل معنا</h5>

            </div>
            <div class="modal-body">
            <form method="get"  enctype="multipart/form-data" action="{{url('/index')}}">
                <!-- message body -->
                <div class="form-group">
                  <textarea rows="10" class="form-control" id="contact-message" name="message-body" placeholder="تواصل معنا..."></textarea>
                </div>
                 <!-- submit form -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">رجوع</button>
                  <input type="submit" name="contact-us" value="أرسال" class="btn btn-primary">
                </div>
              </form>
            </div>
     
          </div>
        </div>
      </div>
     <!--END MODAL-->