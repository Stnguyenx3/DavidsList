<div class="container main">

	<div class="row user-messages">

		<div class="col-md-2 messages-other-users custom-border linear-gradient-bg">
			<!-- Links to other users that this user has messaged. -->
			<h3 class="messages-header centered-header">Contacts</h3>
			<ul>
			<li>AnotherUser1</li>
			<li>AnotherUser2</li>
			<li>AnotherUser3</li>
			</ul>

		</div>

		<div class="col-md-1"></div>

		<div class="col-md-9 messages-content custom-border">

		<!-- Main chat message window -->

			<div class="row user-message-history linear-gradient-bg">
			<h3 class="messages-header centered-header">Messages</h3>

				<div class="col-md-12" id="all-conversation">

					<!-- <div class="row messages-single" id="message-1">
						<p>
							Other User: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed lacus ac turpis feugiat rhoncus. Mauris scelerisque nec nibh et facilisis. Etiam imperdiet dui nibh. Suspendisse maximus tellus sed neque hendrerit, ac commodo ipsum facilisis. Duis hendrerit consequat tortor, vitae condimentum enim consectetur ac. Aenean iaculis eleifend metus nec rhoncus. Nulla auctor et neque ac rutrum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In hendrerit rhoncus nulla, id malesuada odio varius sed. Aenean porttitor elit eu commodo rutrum. Nullam aliquet, diam ut ultrices feugiat, odio orci placerat enim, et mattis nulla neque non ante. Pellentesque quis libero velit. Nulla et ultricies nisl, eget bibendum enim. Donec ut purus laoreet, cursus ligula vel, tempor leo. Sed porta in purus quis porta.
						</p>
					</div>

					<div class="row messages-single" id="message-2">
						<p>
							Other User: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed lacus ac turpis feugiat rhoncus. Mauris scelerisque nec nibh et facilisis. Etiam imperdiet dui nibh. Suspendisse maximus tellus sed neque hendrerit, ac commodo ipsum facilisis. Duis hendrerit consequat tortor, vitae condimentum enim consectetur ac. Aenean iaculis eleifend metus nec rhoncus. Nulla auctor et neque ac rutrum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In hendrerit rhoncus nulla, id malesuada odio varius sed. Aenean porttitor elit eu commodo rutrum. Nullam aliquet, diam ut ultrices feugiat, odio orci placerat enim, et mattis nulla neque non ante. Pellentesque quis libero velit. Nulla et ultricies nisl, eget bibendum enim. Donec ut purus laoreet, cursus ligula vel, tempor leo. Sed porta in purus quis porta.
						</p>
					</div>

					<div class="row messages-single" id="message-3">
						<p>
							Other User: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed lacus ac turpis feugiat rhoncus. Mauris scelerisque nec nibh et facilisis. Etiam imperdiet dui nibh. Suspendisse maximus tellus sed neque hendrerit, ac commodo ipsum facilisis. Duis hendrerit consequat tortor, vitae condimentum enim consectetur ac. Aenean iaculis eleifend metus nec rhoncus. Nulla auctor et neque ac rutrum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In hendrerit rhoncus nulla, id malesuada odio varius sed. Aenean porttitor elit eu commodo rutrum. Nullam aliquet, diam ut ultrices feugiat, odio orci placerat enim, et mattis nulla neque non ante. Pellentesque quis libero velit. Nulla et ultricies nisl, eget bibendum enim. Donec ut purus laoreet, cursus ligula vel, tempor leo. Sed porta in purus quis porta.
						</p>
					</div> -->

				</div>


			</div>

			<div class="row user-message-to-send">

			<div class=" col-md-12 input-group">
			    <textarea class="form-control messages-send-box" id="message-box" rows="3"></textarea>     
			    <span class="input-group-addon btn btn-primary" onclick="onClickSend()" id="chat-btn-send-reply">Send</span>
			</div>


			</div>

		</div>


	</div>

</div>

<script type="text/javascript" src="<?php echo URL; ?>js/messages.js"></script>