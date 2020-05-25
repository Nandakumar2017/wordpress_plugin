<?php
/**
 * Plugin Name: Email Chat
 * Plugin URI: https://nandakumarn.sgedu.site/cp5637/email-chat
 * Description: Email Chat Plugin for SEED website
 * Version: 1.0
 * Author: Nandakumar Nagesh
 * Author URI: https://nandakumarn.sgedu.site/cp5637/
 */
add_action( 'the_content', 'my_thank_you_text' );

function my_thank_you_text ( $content ) {
    return $content .= '<p>Thank you for visiting our site!, For more info contact our friendly team</p>';
}

function seed_form() 
{
	
	$content = 'Express your interest, we will get back to you soon!';
	$content .= '<form method="post" action="https://nandakumarn.sgedu.site/cp5637/thank-you">';
	
	$content .= '<input type="text" name="full_name" placeholder="Full Name" />';
	$content .= '<br />';
	
	$content .= '<input type="text" name="email_address" placeholder="Email Address" />';
	$content .= '<br />';
	
	$content .= '<input type="text" name="phone_number" placeholder="Phone Number" />';
	$content .= '<br />';
	
	$content .= '<textarea name="comments" placeholder="Give us your Comments"></textarea>';
	$content .= '<br />';
	
	$content .= '<input type="submit" name="seed_submit_form" value="SUBMIT" />';
	$content .= '<br />';
	
	$content .= '</form>';
	
	return $content;
	
	}
	
	add_shortcode('seed_contact_form','seed_form');
	
	
	
function set_html_content_type()
	{
		return 'text/html';
	}
	
function seed_form_capture()
{
	if(array_key_exists('seed_submit_form', $_POST))
	{
		$to = "nandakumar.nagesh@my.jcu.edu.au";
		$subject = "Seed Contact Form Submission";
		$body = '';
		
		$body .= 'Name: '.$_POST['full_name'].' <br />';
		$body .= 'Email: '.$_POST['email_address'].' <br />';
		$body .= 'Phone: '.$_POST['phone_number'].' <br />';
		$body .= 'Comments: '.$_POST['comments'].' <br />';
		
		add_filter('wp_mail_content_type','set_html_content_type');
		
		wp_mail($to,$subject,$body);
		
		remove_filter('wp_mail_content_type','set_html_content_type');
		
	}
}

add_action('wp_head','seed_form_capture');

	