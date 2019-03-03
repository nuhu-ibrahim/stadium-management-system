<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Please Sign Up</h3>
			</div>

			<?php $this->load->view('message_temp'); ?>

			<div class="panel-body">
				<?php echo form_open('User/process_registration'); ?>
					<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="First Name" name="first_name" type="text" autofocus>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Last Name" name="last_name" type="text" value="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Phone Number" name="phone_number" type="text" value="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" value="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Confirm Password" name="password_confirm" type="password" value="">
						</div>
						<!-- Change this to a button or input when using this as a form -->
						<button type="submit" class="btn btn-lg btn-success btn-block">Sign Up</button>
						<a href="<?php echo base_url('User/login'); ?>" class="btn btn-lg btn-primary btn-block">Login</a>
					</fieldset>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
