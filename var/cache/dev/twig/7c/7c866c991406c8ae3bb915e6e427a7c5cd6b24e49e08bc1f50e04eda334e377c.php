<?php

/* WKTPlatformBundle:Article:add.html.twig */
class __TwigTemplate_256e28cc4faf65b5902f4faff091b170ee89b2d188502e0f53a5565f46a8955c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("::layout.html.twig", "WKTPlatformBundle:Article:add.html.twig", 2);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_dc0c33b411466d6c9dad4e833e5fb7b8840d79b327ad0530ac0c0a5658bad9b4 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_dc0c33b411466d6c9dad4e833e5fb7b8840d79b327ad0530ac0c0a5658bad9b4->enter($__internal_dc0c33b411466d6c9dad4e833e5fb7b8840d79b327ad0530ac0c0a5658bad9b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WKTPlatformBundle:Article:add.html.twig"));

        $__internal_87ad64d2f3288935fddc7bf79666a7a4d1356e55e3e0c1534c723e4284b86388 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_87ad64d2f3288935fddc7bf79666a7a4d1356e55e3e0c1534c723e4284b86388->enter($__internal_87ad64d2f3288935fddc7bf79666a7a4d1356e55e3e0c1534c723e4284b86388_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WKTPlatformBundle:Article:add.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_dc0c33b411466d6c9dad4e833e5fb7b8840d79b327ad0530ac0c0a5658bad9b4->leave($__internal_dc0c33b411466d6c9dad4e833e5fb7b8840d79b327ad0530ac0c0a5658bad9b4_prof);

        
        $__internal_87ad64d2f3288935fddc7bf79666a7a4d1356e55e3e0c1534c723e4284b86388->leave($__internal_87ad64d2f3288935fddc7bf79666a7a4d1356e55e3e0c1534c723e4284b86388_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_8251abada45c401f7040ad4607bd77a13596dde9b9bddef8f82de9cb41a0cc9b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8251abada45c401f7040ad4607bd77a13596dde9b9bddef8f82de9cb41a0cc9b->enter($__internal_8251abada45c401f7040ad4607bd77a13596dde9b9bddef8f82de9cb41a0cc9b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_0a46be3fb407ed38c9cea72ec7bc18bcdffe127a63cd6d90bc156fe17ba57553 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0a46be3fb407ed38c9cea72ec7bc18bcdffe127a63cd6d90bc156fe17ba57553->enter($__internal_0a46be3fb407ed38c9cea72ec7bc18bcdffe127a63cd6d90bc156fe17ba57553_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h3>Formulaire d'annonce</h3>

    <div class=\"well\">
      ";
        // line 7
        echo         $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new Twig_Error_Runtime('Variable "form" does not exist.', 7, $this->getSourceContext()); })()), 'form');
        echo "
    </div>
    ";
        // line 9
        echo $this->env->getExtension('Stfalcon\Bundle\TinymceBundle\Twig\Extension\StfalconTinymceExtension')->tinymceInit();
        echo "
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
<script>

var \$article = \$('#wkt_platformbundle_article_hasNewPart');
// When sport gets selected ...
\$article.change(function() {
  // ... retrieve the corresponding form.
  var \$form = \$(this).closest('form');
  // Simulate form data, but only include the selected sport value.
  var data = {};
  data[\$article.attr('name')] = \$article.val();
  // Submit data via AJAX to the form's action path.
  \$.ajax({
    url : \$form.attr('action'),
    type: \$form.attr('method'),
    data : data,
    success: function(html) {
      // Replace current position field ...
      if (\$article.val() === 'Oui') {
      \t// \$('#wkt_platformbundle_article_part').display();
      \t\$('#wkt_platformbundle_article_part_title').fadeIn();
      \t\$('#wkt_platformbundle_article_part').fadeOut();
      }
      if (\$article.val() === 'Non') {
      \t// \$('#wkt_platformbundle_article_part').display();
      \t\$('#wkt_platformbundle_article_part').fadeIn();
      \t\$('#wkt_platformbundle_article_part_title').fadeOut();
      }

      // \$('#wkt_platformbundle_article_part').replaceWith(
      //   // ... with the returned one from the AJAX response.
      //   \$(html).find('#wkt_platformbundle_article_part')
      // );
      // Position field now displays the appropriate positions.
    }
  });
});
</script>
";
        
        $__internal_0a46be3fb407ed38c9cea72ec7bc18bcdffe127a63cd6d90bc156fe17ba57553->leave($__internal_0a46be3fb407ed38c9cea72ec7bc18bcdffe127a63cd6d90bc156fe17ba57553_prof);

        
        $__internal_8251abada45c401f7040ad4607bd77a13596dde9b9bddef8f82de9cb41a0cc9b->leave($__internal_8251abada45c401f7040ad4607bd77a13596dde9b9bddef8f82de9cb41a0cc9b_prof);

    }

    public function getTemplateName()
    {
        return "WKTPlatformBundle:Article:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 9,  54 => 7,  49 => 4,  40 => 3,  11 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# src/WKT/PlatformBundle/Resources/views/Article/add.html.twig #}
{% extends '::layout.html.twig' %}
{% block body %}
    <h3>Formulaire d'annonce</h3>

    <div class=\"well\">
      {{ form(form) }}
    </div>
    {{ tinymce_init() }}
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
<script>

var \$article = \$('#wkt_platformbundle_article_hasNewPart');
// When sport gets selected ...
\$article.change(function() {
  // ... retrieve the corresponding form.
  var \$form = \$(this).closest('form');
  // Simulate form data, but only include the selected sport value.
  var data = {};
  data[\$article.attr('name')] = \$article.val();
  // Submit data via AJAX to the form's action path.
  \$.ajax({
    url : \$form.attr('action'),
    type: \$form.attr('method'),
    data : data,
    success: function(html) {
      // Replace current position field ...
      if (\$article.val() === 'Oui') {
      \t// \$('#wkt_platformbundle_article_part').display();
      \t\$('#wkt_platformbundle_article_part_title').fadeIn();
      \t\$('#wkt_platformbundle_article_part').fadeOut();
      }
      if (\$article.val() === 'Non') {
      \t// \$('#wkt_platformbundle_article_part').display();
      \t\$('#wkt_platformbundle_article_part').fadeIn();
      \t\$('#wkt_platformbundle_article_part_title').fadeOut();
      }

      // \$('#wkt_platformbundle_article_part').replaceWith(
      //   // ... with the returned one from the AJAX response.
      //   \$(html).find('#wkt_platformbundle_article_part')
      // );
      // Position field now displays the appropriate positions.
    }
  });
});
</script>
{% endblock %}


", "WKTPlatformBundle:Article:add.html.twig", "/Users/florian/Documents/developpement/Openclassrooms/DWJ/Sites/projet5/wikitech/src/WKT/PlatformBundle/Resources/views/Article/add.html.twig");
    }
}
