<div style="margin:0!important;padding:0;background-color:#f0f7f7" bgcolor="#f0f7f7">
	<table style="border-collapse:collapse" width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td style="padding:35px 15px 0 15px" class="m_-6768696684458228336mobile-padding" width="100%" valign="top" align="center">
					<table width="600" cellspacing="0" cellpadding="0" border="0" align="center">
						<tbody>
							<tr>
								<td width="600" valign="top" align="center">
									<table style="max-width:600px;border-collapse:collapse" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
										<tbody>
											<tr>
												<td style="padding:0 0 50px 0" valign="top" align="center">
													<?php 
														$menu_options = request()->route()->getAction();
														$MainValues = substr($menu_options['controller'], strrpos($menu_options['controller'], "\\") + 1);
														$MainSettings = explode('@', $MainValues);
														$controller = $MainSettings[0];
														$action = $MainSettings[1];
														if($controller=="CampaignController" || $controller=="AgentsController") { ?>
															<img src="{{asset('imgs/121-logo.png')}}" style="display:block" class="CToWUd" width="150px" border="0">
														<?php } else { ?>
															<img src="{{url('').'/frontend/images/logo.png'}}" style="display:block" class="CToWUd" width="150px" border="0">
														<?php } ?>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding:0 15px 50px 15px" class="m_-6768696684458228336mobile-padding" width="100%" valign="top" height="100%" bgcolor="#f0f7f7" align="center">
					<table style="max-width:600px;border-collapse:collapse" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
						<tbody>
							<tr>
								<td style="padding:0 0 25px 0;font-family:Open Sans,Helvetica,Arial,sans-serif" valign="top" align="center">
									<table style="border-collapse:collapse" width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody>
											<tr>
												<td style="border-top-left-radius:10px;border-top-right-radius:10px;padding:55px;padding-bottom:1px" bgcolor="#ffffff" align="center">
													<table style="border-collapse:collapse" width="100%" cellspacing="0" cellpadding="0" border="0">
														<tbody>
															<tr>
												                <td colspan="2" style="font-family:Open Sans,Helvetica,Arial,sans-serif" align="left">
																	@yield('content')
																</td>
															</tr>	
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td colspan="2" style="padding:18px;font-family:Open Sans,Helvetica,Arial,sans-serif;color:#999999;background-color:#263f4d;border-bottom-left-radius:10px;border-bottom-right-radius:10px" valign="top" align="center">
													<p style="color:#c8ced2;font-size:12px">powered by Homihelp</p>
												</td>
											</tr> 
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>