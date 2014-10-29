<section>
        	<h2><i class="tl"></i><span>Membership</span><i class="tr"></i></h2>
          <div class="login-block">
              <div class="loginLeft">
                  <iframe src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Famedcenter&amp;width=500&amp;height=378&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=278811578958877" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:478px;" allowTransparency="true"></iframe>
              </div>
              <div class="loginRight">
                  <h2>Register / สมัครสมาชิก</h2>
                  {{ Form::open(array('action' => array('HomeController@handle_register'), 'method' => 'post')) }}
                      <input type="text" name="firstname" placeholder="First Name" class="short"/>
                      <input type="text" name="lastname" placeholder="Last Name" class="short"/>
                      <input type="text" name="email" placeholder="E-mail"/>
                      <input type="password" name="password" placeholder="Password"/>
                      <input type="password" name="confirm" placeholder="Confirm Password"/>
                      <input type="submit" name="submit" value="Sign Up" />
                  {{ Form::close() }}
                  
                  
              </div>
          </div>
             
        </section>