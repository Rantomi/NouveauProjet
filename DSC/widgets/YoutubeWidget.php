<?php 
	class YoutubeWidget extends WP_Widget{

		public function __construct() {
			parent::__construct('youtube_widget', 'Youtube Widget');
		}
		public function widget($args, $instance){
			// echo '<h1 class="mt-5">Bonjour tous le monde</h1>';
			// var_dump($args);
			// var_dump($instance);

			echo $args['before_widget'];
				if(isset($instance['title'])){
					$title=apply_filters('widgets_title', $instance['title']);
					echo $args['before_title'] . $title . $args['after_title'];
				};
				?>

				<iframe src="<?php echo get_template_directory_uri().'/widgets/Iary - Ny Fanantenako.mp4'; ?>" width="560" height="315" frameborder=0 allow="accelormeter;  ;encrypted-media;gyroscope;picture-in-picture;" allowfullscreen></iframe>
				
			<?php  	
			echo $args['after_widget'];

			// echo $args['before_widget'];
			// if(isset($instance['title'])){
			// 	$title=apply_filter('widget_title', $instance['title']);
			// 	echo $args['before_title']. $instance['title']. $args['after_title'];
			// }
			// echo $args['after_widget'];
		}
		public function form ($instance) {
			
			$title=	isset($instance['title']) ? $instance['title'] : '';
			?>

			<p>
				<label for="<?= $this->get_field_id('title');  ?>">Titre</label>
				<input type="text" class="widefat" name="<?= $this->get_field_name('title');  ?>" id="<?= $this->get_field_id('title');  ?>" value="<?=esc_attr($title) ?>">
			</p>
			<?php  
		}
		public function update ($newInstance, $oldInstance) {
			// var_dump($newInstance);die();
			return $newInstance;
			
		}
	}
?>
