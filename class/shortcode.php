<?php
 class Createpost {
    public function __construct(){
        add_shortcode( 'tour', array( $this, 'getposts' ) );
        add_shortcode( 'page', array( $this, 'getpage' ) );
        add_shortcode( 'tour2', array( $this, 'getpoststheme' ) );
        add_shortcode( 'tour3', array( $this, 'getpoststheme3' ) );
        add_shortcode( 'newcalendar', array( $this, 'newcalendar' ) );
        add_shortcode( 'page2', array( $this, 'getpoststheme2' ) );
        add_shortcode( 'des', array( $this, 'getdestinos' ) );
        add_shortcode( 'cols', array( $this, 'contentColumns' ) );
        add_shortcode( 'col', array( $this, 'columnsText' ) );
        add_shortcode( 'hightitles', array( $this, 'highlightsTitles' ) );
        add_shortcode( 'hightitle', array( $this, 'highlightsItemTitle' ) );
        add_shortcode( 'hightexts', array( $this, 'highlightsTexts' ) );
        add_shortcode( 'hightext', array( $this, 'highlightsItemText' ) );
        add_shortcode( 'cfaqs', array( $this, 'accordionsFaq' ) );
        add_shortcode( 'cfaq', array( $this, 'accordionItemFaq' ) );
    }
    public function contentColumns($atts, $content = null){
        extract(shortcode_atts(array(  
            'class' => '',
        ), $atts));
        $class = $class ? ' '.$class : '';
        $content = do_shortcode($content);
        return '<div class="content_columns_page'.$class.'">'.$content.'</div>';
    }
    public function columnsText($atts, $content = null){
        extract(shortcode_atts(array(  
            'w' => '',
            'class' => '',
        ), $atts)); 
        $class = $class ? ' '.$class : '';
        $w = $w ? ' style="width:'.$w.'%;"' : '';
        return '<div class="column_text_page '.$class.'"'.$w.'>'.$content.'</div>';
    }
    /*
    #
    # Shorcode para agregar highlight a las categorias
    #
    */
    public function highlightsTitles($atts,$content = null){
      $content = do_shortcode(shortcode_unautop($content));
      return '<div class="d-flex align-items-start content-highlights-tour">
                <div class="nav flex-column nav-pills me-3 title-highlights-tour" id="v-pills-tab" role="tablist" aria-orientation="vertical">'. $content .'</div>';
    }
    public function highlightsItemTitle($atts){
      extract(shortcode_atts(array(  
          'id' => '',
          'title' => '',
      ), $atts)); 
      $active = $id==="1"?"active":"";
      return '<div class="'.$active.'" id="v-pills-'.$id.'-tab" data-bs-toggle="pill" data-bs-target="#v-pills-'.$id.'" type="button" role="tab" aria-controls="v-pills-'.$id.'" aria-selected="true"><i class="bi bi-geo-alt"></i> '.$title.'</div>';
    }
    public function highlightsTexts($atts,$content = null){
      $content = do_shortcode(shortcode_unautop($content));
      return '<div class="tab-content text-highlights-tour" id="v-pills-tabContent">'. $content .'</div></div>';
    }
    public function highlightsItemText($atts, $content= null){
      $content = do_shortcode(shortcode_unautop($content));
      extract(shortcode_atts(array(  
          'id' => '',
      ), $atts)); 
      $active = $id==="1"?"show active":"";
      return '<div class="tab-pane fade '.$active.'" id="v-pills-'.$id.'" role="tabpanel" aria-labelledby="v-pills-'.$id.'-tab" tabindex="0">'. $content .'</div>';
    }

    /*
    #
    # End shorcode para agregar highlight
    #
    */
    /*
    #
    # Shorcode para agregar faqs de a las categorias
    #
    */
    public function accordionsFaq($atts, $content = null){
      $content = do_shortcode(shortcode_unautop($content));
      return '<div class="faqs-category-tour"><div class="accordion" id="accordionFaqs">'. $content .'</div></div>';
    }
    public function accordionItemFaq($atts, $content = null){
      $content = do_shortcode(shortcode_unautop($content));
      extract(shortcode_atts(array(  
          'title' => '',
          'id' => '',
      ), $atts)); 
      $active1 = $id==="1"?"show":"";
      $active2 = $id==="1"?"true":"false";
      return '<div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-'. $id .'" aria-expanded="'. $active2 .'" aria-controls="collapse-'. $id .'">
                      '. $title .'
                    </button>
                  </h3>
                  <div id="collapse-'. $id .'" class="accordion-collapse collapse '. $active1 .'" data-bs-parent="#accordionFaqs">
                    <div class="accordion-body">
                      '. $content .'
                    </div>
                  </div>
                </div>';

    }
    /*
    #
    # End shorcode para agregar faqs
    #
    */
    public function getposts($atts) {
       extract(shortcode_atts(array(  
            'title' => '',
            'key' => '', 
            'cat'=>'',
        ), $atts)); 
       ob_start();
          get_template_part('template-parts/get_tours','get_post',array('title'=>$title,'key'=>$key,'cat'=>$cat));
        ob_get_contents();
      return  ob_get_clean();
    }
    public function getpage($atts) {
      extract(shortcode_atts(array(  
           'title' => '',
           'key' => '', 
           'cat'=>'',
       ), $atts)); 
      ob_start();
         get_template_part('template-parts/get_page','get_post',array('title'=>$title,'key'=>$key,'cat'=>$cat));
       ob_get_contents();
     return  ob_get_clean();
   }
    public function getpoststheme($atts) {
        extract(shortcode_atts(array(  
             'title' => '',
             'key' => '', 
         ), $atts)); 
        ob_start();
        get_template_part('template/post2','get_post',array('title'=>$title,'key'=>$key));
         ob_get_contents();
       return  ob_get_clean();
     }
     public function getpoststheme2($atts) {
      extract(shortcode_atts(array(  
           'title' => '',
           'key' => '', 
       ), $atts)); 
      ob_start();
      get_template_part('template/get_pagetour','get_post',array('title'=>$title,'key'=>$key));
       ob_get_contents();
     return  ob_get_clean();
   }
   public function getdestinos($atts) {
    extract(shortcode_atts(array(  
         'title' => '',
         'key' => '', 
     ), $atts)); 
    ob_start();
    get_template_part('template/get_destinos','get_post',array('title'=>$title,'key'=>$key));
     ob_get_contents();
   return  ob_get_clean();
 }
   public function getpoststheme3($atts) {
      extract(shortcode_atts(array(  
          'title' => '',
          'key' => '', 
      ), $atts)); 
      ob_start();
      get_template_part('template/get_pack','get_post',array('title'=>$title,'key'=>$key));
      ob_get_contents();
    return  ob_get_clean();
  }
    //  calendar  

    public function newcalendar(){
      extract(shortcode_atts(array(  
        'title' => '',
        'key' => '', 
          ), $atts)); 
        ob_start();
        get_template_part('template-parts/get_calendar','get_post',array('title'=>$title,'key'=>$key));
          ob_get_contents();
        return  ob_get_clean();
    }
}
new Createpost();
?>