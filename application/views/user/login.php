<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Please Sign In</h3>
			</div>

			<?php $this->load->view('message_temp'); ?>

			<div class="panel-body">
				<?php echo form_open('User/process_login'); ?>
					<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password">
						</div>						
						<!-- Change this to a button or input when using this as a form -->
						<button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
						<a href="<?php echo base_url('User/register'); ?>" class="btn btn-lg btn-primary btn-block">Create Account</a>
						<br>
						<p><strong>Forgot Password?</strong> Call 08030203020 to recover password.</p>
					</fieldset>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
