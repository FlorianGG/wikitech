<?php

/* ::layout.html.twig */
class __TwigTemplate_9a23ea19e8cd8e02a6982b237b6176d67422707ce0bd71ffb882ba42a0c58539 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a49d662dc36c6055338aeef9b8519df455a453ab2fe108aa0d491e2d9d33364f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a49d662dc36c6055338aeef9b8519df455a453ab2fe108aa0d491e2d9d33364f->enter($__internal_a49d662dc36c6055338aeef9b8519df455a453ab2fe108aa0d491e2d9d33364f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::layout.html.twig"));

        $__internal_ea1bb2c95ae310deeb9214318fc9d2ee2018b27b56b442825e3ff2453baa1fdf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ea1bb2c95ae310deeb9214318fc9d2ee2018b27b56b442825e3ff2453baa1fdf->enter($__internal_ea1bb2c95ae310deeb9214318fc9d2ee2018b27b56b442825e3ff2453baa1fdf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/web/css/style.css\">
        ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "    </head>
    <body>

        <header>
            <nav class=\"navbar navbar-default\">
              <div class=\"container-fluid\">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class=\"navbar-header\">
                  <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                  </button>
                  <a class=\"navbar-brand\" href=\"#\"><img alt=\"Wikitech\" src=\"http://localhost/Projet5/wikitech/web/images/wikitech.png\"></a>
                </div>
                <form class=\"navbar-form navbar-left\">
                  <div class=\"form-group\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"Votre recherche\">
                  </div>
                  <button type=\"submit\" class=\"btn btn-default\">Rechercher</button>
                </form>
                <div class=\"collapse navbar-collapse navbar-right\" id=\"bs-example-navbar-collapse-1\">
                  <ul class=\"nav navbar-nav\">
                    <li><a href=\"";
        // line 36
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wkt_core_home");
        echo "\">Accueil</a></li>
                    <li><a href=\"";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wkt_platform_index");
        echo "\">Formations</a></li>
                    <li><a href=\"#\">S'inscrire</a></li>
                    <li><a href=\"#\">Connection</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
        </header>
        <div class=\"container\">
          ";
        // line 46
        $this->displayBlock('body', $context, $blocks);
        // line 47
        echo "        </div>
        <footer class=\"\">
          <p class=\"text-center\">The sky's the limit © ";
        // line 49
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " and beyond.</p>
        </footer>
        ";
        // line 51
        $this->displayBlock('javascripts', $context, $blocks);
        // line 56
        echo "    </body>
</html>
";
        
        $__internal_a49d662dc36c6055338aeef9b8519df455a453ab2fe108aa0d491e2d9d33364f->leave($__internal_a49d662dc36c6055338aeef9b8519df455a453ab2fe108aa0d491e2d9d33364f_prof);

        
        $__internal_ea1bb2c95ae310deeb9214318fc9d2ee2018b27b56b442825e3ff2453baa1fdf->leave($__internal_ea1bb2c95ae310deeb9214318fc9d2ee2018b27b56b442825e3ff2453baa1fdf_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_cb7ca841331885a5775b4bef018460391b66d815ebc3e23d55c541a1d6161e84 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_cb7ca841331885a5775b4bef018460391b66d815ebc3e23d55c541a1d6161e84->enter($__internal_cb7ca841331885a5775b4bef018460391b66d815ebc3e23d55c541a1d6161e84_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_94dedf27951f0927834bb0b9b5a5472623366412c7323dc241e43fe37666eaea = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_94dedf27951f0927834bb0b9b5a5472623366412c7323dc241e43fe37666eaea->enter($__internal_94dedf27951f0927834bb0b9b5a5472623366412c7323dc241e43fe37666eaea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "WikiTech";
        
        $__internal_94dedf27951f0927834bb0b9b5a5472623366412c7323dc241e43fe37666eaea->leave($__internal_94dedf27951f0927834bb0b9b5a5472623366412c7323dc241e43fe37666eaea_prof);

        
        $__internal_cb7ca841331885a5775b4bef018460391b66d815ebc3e23d55c541a1d6161e84->leave($__internal_cb7ca841331885a5775b4bef018460391b66d815ebc3e23d55c541a1d6161e84_prof);

    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_93cd8bfbe5b2d8a15774321036b14df5b0efbcf8ef2431ab747868d01d7f1b74 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_93cd8bfbe5b2d8a15774321036b14df5b0efbcf8ef2431ab747868d01d7f1b74->enter($__internal_93cd8bfbe5b2d8a15774321036b14df5b0efbcf8ef2431ab747868d01d7f1b74_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_49d351e56a0aae5b5163608b92654972c17ad70f7d6bf9a0b8aac0d267d337c4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_49d351e56a0aae5b5163608b92654972c17ad70f7d6bf9a0b8aac0d267d337c4->enter($__internal_49d351e56a0aae5b5163608b92654972c17ad70f7d6bf9a0b8aac0d267d337c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 9
        echo "          ";
        // line 10
        echo "          <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
        ";
        
        $__internal_49d351e56a0aae5b5163608b92654972c17ad70f7d6bf9a0b8aac0d267d337c4->leave($__internal_49d351e56a0aae5b5163608b92654972c17ad70f7d6bf9a0b8aac0d267d337c4_prof);

        
        $__internal_93cd8bfbe5b2d8a15774321036b14df5b0efbcf8ef2431ab747868d01d7f1b74->leave($__internal_93cd8bfbe5b2d8a15774321036b14df5b0efbcf8ef2431ab747868d01d7f1b74_prof);

    }

    // line 46
    public function block_body($context, array $blocks = array())
    {
        $__internal_8d32c2b4fc02aca6eb98d086299064e376317682f20dbc8bf1bb7025337ecad8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8d32c2b4fc02aca6eb98d086299064e376317682f20dbc8bf1bb7025337ecad8->enter($__internal_8d32c2b4fc02aca6eb98d086299064e376317682f20dbc8bf1bb7025337ecad8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_629ac1da6f1b76354986dd94cc01763493739fac58aee73b1317bfe8ce2e9db2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_629ac1da6f1b76354986dd94cc01763493739fac58aee73b1317bfe8ce2e9db2->enter($__internal_629ac1da6f1b76354986dd94cc01763493739fac58aee73b1317bfe8ce2e9db2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_629ac1da6f1b76354986dd94cc01763493739fac58aee73b1317bfe8ce2e9db2->leave($__internal_629ac1da6f1b76354986dd94cc01763493739fac58aee73b1317bfe8ce2e9db2_prof);

        
        $__internal_8d32c2b4fc02aca6eb98d086299064e376317682f20dbc8bf1bb7025337ecad8->leave($__internal_8d32c2b4fc02aca6eb98d086299064e376317682f20dbc8bf1bb7025337ecad8_prof);

    }

    // line 51
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f96179579d9ceae73ddab175a9b86b96918fb7be18c053aaa8819374c6bc8567 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f96179579d9ceae73ddab175a9b86b96918fb7be18c053aaa8819374c6bc8567->enter($__internal_f96179579d9ceae73ddab175a9b86b96918fb7be18c053aaa8819374c6bc8567_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_f0c55383e3b4b3948ba48c7a7745ba93393e3596f170406e38ba01cd8936a50d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f0c55383e3b4b3948ba48c7a7745ba93393e3596f170406e38ba01cd8936a50d->enter($__internal_f0c55383e3b4b3948ba48c7a7745ba93393e3596f170406e38ba01cd8936a50d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 52
        echo "            <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
            <!-- Latest compiled and minified JavaScript -->
            <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
        ";
        
        $__internal_f0c55383e3b4b3948ba48c7a7745ba93393e3596f170406e38ba01cd8936a50d->leave($__internal_f0c55383e3b4b3948ba48c7a7745ba93393e3596f170406e38ba01cd8936a50d_prof);

        
        $__internal_f96179579d9ceae73ddab175a9b86b96918fb7be18c053aaa8819374c6bc8567->leave($__internal_f96179579d9ceae73ddab175a9b86b96918fb7be18c053aaa8819374c6bc8567_prof);

    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 52,  170 => 51,  153 => 46,  142 => 10,  140 => 9,  131 => 8,  113 => 5,  101 => 56,  99 => 51,  94 => 49,  90 => 47,  88 => 46,  76 => 37,  72 => 36,  46 => 12,  44 => 8,  39 => 6,  35 => 5,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}WikiTech{% endblock %}</title>
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/web/css/style.css\">
        {% block stylesheets %}
          {# On charge le CSS de bootstrap depuis le site directement #}
          <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
        {% endblock %}
    </head>
    <body>

        <header>
            <nav class=\"navbar navbar-default\">
              <div class=\"container-fluid\">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class=\"navbar-header\">
                  <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                  </button>
                  <a class=\"navbar-brand\" href=\"#\"><img alt=\"Wikitech\" src=\"http://localhost/Projet5/wikitech/web/images/wikitech.png\"></a>
                </div>
                <form class=\"navbar-form navbar-left\">
                  <div class=\"form-group\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"Votre recherche\">
                  </div>
                  <button type=\"submit\" class=\"btn btn-default\">Rechercher</button>
                </form>
                <div class=\"collapse navbar-collapse navbar-right\" id=\"bs-example-navbar-collapse-1\">
                  <ul class=\"nav navbar-nav\">
                    <li><a href=\"{{ path('wkt_core_home') }}\">Accueil</a></li>
                    <li><a href=\"{{ path('wkt_platform_index') }}\">Formations</a></li>
                    <li><a href=\"#\">S'inscrire</a></li>
                    <li><a href=\"#\">Connection</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
        </header>
        <div class=\"container\">
          {% block body %}{% endblock %}
        </div>
        <footer class=\"\">
          <p class=\"text-center\">The sky's the limit © {{ 'now'|date('Y') }} and beyond.</p>
        </footer>
        {% block javascripts %}
            <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
            <!-- Latest compiled and minified JavaScript -->
            <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>
        {% endblock %}
    </body>
</html>
", "::layout.html.twig", "/Users/florian/Documents/developpement/Openclassrooms/DWJ/Sites/projet5/wikitech/app/Resources/views/layout.html.twig");
    }
}
