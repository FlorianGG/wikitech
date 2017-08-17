<?php

/* WKTPlatformBundle:Article:view.html.twig */
class __TwigTemplate_79d69bb4741e44efb95f8d79be66693e26af9ab4e8daa1305ccc413297af5a42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::layout.html.twig", "WKTPlatformBundle:Article:view.html.twig", 1);
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
        $__internal_87cbcd4d28c28f60855fddf77dd5eb1a6d6a9e3d31e3763945f9ccd24932ee87 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_87cbcd4d28c28f60855fddf77dd5eb1a6d6a9e3d31e3763945f9ccd24932ee87->enter($__internal_87cbcd4d28c28f60855fddf77dd5eb1a6d6a9e3d31e3763945f9ccd24932ee87_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WKTPlatformBundle:Article:view.html.twig"));

        $__internal_4314cbe92caac388e9123602825cbd0725832edb5a02be3cc0dfbcca3ce72fdf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4314cbe92caac388e9123602825cbd0725832edb5a02be3cc0dfbcca3ce72fdf->enter($__internal_4314cbe92caac388e9123602825cbd0725832edb5a02be3cc0dfbcca3ce72fdf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WKTPlatformBundle:Article:view.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_87cbcd4d28c28f60855fddf77dd5eb1a6d6a9e3d31e3763945f9ccd24932ee87->leave($__internal_87cbcd4d28c28f60855fddf77dd5eb1a6d6a9e3d31e3763945f9ccd24932ee87_prof);

        
        $__internal_4314cbe92caac388e9123602825cbd0725832edb5a02be3cc0dfbcca3ce72fdf->leave($__internal_4314cbe92caac388e9123602825cbd0725832edb5a02be3cc0dfbcca3ce72fdf_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_13410c98d1f88dffdba144ab564537618c6890f8c16ade03d96212999b6b53fb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_13410c98d1f88dffdba144ab564537618c6890f8c16ade03d96212999b6b53fb->enter($__internal_13410c98d1f88dffdba144ab564537618c6890f8c16ade03d96212999b6b53fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_863e0a74242a7834ca2eeadf28bfab0d36877b3875acb03a563ec4276ee37dd9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_863e0a74242a7834ca2eeadf28bfab0d36877b3875acb03a563ec4276ee37dd9->enter($__internal_863e0a74242a7834ca2eeadf28bfab0d36877b3875acb03a563ec4276ee37dd9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    <div class=\"row\">
        <div class=\"col-offset-sm-3\">
            <a class=\"btn btn-success\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wkt_platform_article_add", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 5, $this->getSourceContext()); })()), "training", array()), "id", array()))), "html", null, true);
        echo "\">Ajouter un article</a>
        </div>
    </div>
    <br>
    <br>
    <div class=\"row\">
        <div class=\"col-sm-3\">
            ";
        // line 12
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("WKTPlatformBundle:Article:summary", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 12, $this->getSourceContext()); })()), "training", array()), "id", array()))));
        echo "
        </div>
        <div class=\"col-sm-9\">
            <div class=\"page-header\">
              <h1>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 16, $this->getSourceContext()); })()), "title", array()), "html", null, true);
        echo "</h1>
            </div>
            <h2>En Bref</h2>
            <div> 
                ";
        // line 21
        echo "                    ";
        echo twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 21, $this->getSourceContext()); })()), "introduction", array());
        echo " ";
        // line 22
        echo "                ";
        // line 23
        echo "            </div>
            <hr>
            <h2>En Détail</h2>
            <div> 
                ";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 27, $this->getSourceContext()); })()), "content", array()), "html", null, true);
        echo " 
            </div>
            <hr>
            ";
        // line 30
        if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["article"] ?? null), "video", array(), "any", false, true), "url", array(), "any", true, true)) {
            // line 31
            echo "                <h2>En Vidéo</h2>
                <div class=\"embed-responsive embed-responsive-16by9\">
                  <iframe class=\"embed-responsive-item\" allowfullscreen src=\"";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 33, $this->getSourceContext()); })()), "video", array()), "url", array()), "html", null, true);
            echo "\"></iframe>
                </div>
                <hr>
            ";
        }
        // line 37
        echo "
            <p><a class=\"btn btn-primary btn-lg\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wkt_platform_view", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 38, $this->getSourceContext()); })()), "training", array()), "id", array()), "slugTraining" => twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new Twig_Error_Runtime('Variable "article" does not exist.', 38, $this->getSourceContext()); })()), "training", array()), "slug", array()))), "html", null, true);
        echo "\">Retour à l'accueil de la formation</a></p>
        </div>
    </div>
";
        
        $__internal_863e0a74242a7834ca2eeadf28bfab0d36877b3875acb03a563ec4276ee37dd9->leave($__internal_863e0a74242a7834ca2eeadf28bfab0d36877b3875acb03a563ec4276ee37dd9_prof);

        
        $__internal_13410c98d1f88dffdba144ab564537618c6890f8c16ade03d96212999b6b53fb->leave($__internal_13410c98d1f88dffdba144ab564537618c6890f8c16ade03d96212999b6b53fb_prof);

    }

    public function getTemplateName()
    {
        return "WKTPlatformBundle:Article:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 38,  108 => 37,  101 => 33,  97 => 31,  95 => 30,  89 => 27,  83 => 23,  81 => 22,  77 => 21,  70 => 16,  63 => 12,  53 => 5,  49 => 3,  40 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '::layout.html.twig' %}
{% block body %}
    <div class=\"row\">
        <div class=\"col-offset-sm-3\">
            <a class=\"btn btn-success\" href=\"{{ path('wkt_platform_article_add', {'id': article.training.id}) }}\">Ajouter un article</a>
        </div>
    </div>
    <br>
    <br>
    <div class=\"row\">
        <div class=\"col-sm-3\">
            {{ render(controller(\"WKTPlatformBundle:Article:summary\", {'id': article.training.id } )) }}
        </div>
        <div class=\"col-sm-9\">
            <div class=\"page-header\">
              <h1>{{ article.title}}</h1>
            </div>
            <h2>En Bref</h2>
            <div> 
                {% autoescape %}
                    {{ article.introduction|raw }} {# var won't be escaped #}
                {% endautoescape %}
            </div>
            <hr>
            <h2>En Détail</h2>
            <div> 
                {{ article.content }} 
            </div>
            <hr>
            {% if article.video.url is defined %}
                <h2>En Vidéo</h2>
                <div class=\"embed-responsive embed-responsive-16by9\">
                  <iframe class=\"embed-responsive-item\" allowfullscreen src=\"{{ article.video.url}}\"></iframe>
                </div>
                <hr>
            {% endif %}

            <p><a class=\"btn btn-primary btn-lg\" href=\"{{ path('wkt_platform_view', {'id': article.training.id, 'slugTraining': article.training.slug}) }}\">Retour à l'accueil de la formation</a></p>
        </div>
    </div>
{% endblock %}



", "WKTPlatformBundle:Article:view.html.twig", "/Users/florian/Documents/developpement/Openclassrooms/DWJ/Sites/projet5/wikitech/src/WKT/PlatformBundle/Resources/views/Article/view.html.twig");
    }
}
