<?php

/* WKTPlatformBundle:Article:summary.html.twig */
class __TwigTemplate_b1dfd3e7782d3a28bbea5f01ee3f02c155ff77a27c775566576bfaabda9aa9e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bbdc288a2d053d12f2881ed59e94f0d95b269c7719eee11d527a749c65dc3cff = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bbdc288a2d053d12f2881ed59e94f0d95b269c7719eee11d527a749c65dc3cff->enter($__internal_bbdc288a2d053d12f2881ed59e94f0d95b269c7719eee11d527a749c65dc3cff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WKTPlatformBundle:Article:summary.html.twig"));

        $__internal_2f6340556f87972873d664a152f98c3b3087107689cf481ff2458783836d20be = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2f6340556f87972873d664a152f98c3b3087107689cf481ff2458783836d20be->enter($__internal_2f6340556f87972873d664a152f98c3b3087107689cf481ff2458783836d20be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WKTPlatformBundle:Article:summary.html.twig"));

        // line 2
        echo "
";
        // line 4
        echo "<div class=\"row\">
\t";
        // line 5
        if (twig_test_empty((isset($context["summary"]) || array_key_exists("summary", $context) ? $context["summary"] : (function () { throw new Twig_Error_Runtime('Variable "summary" does not exist.', 5, $this->getSourceContext()); })()))) {
            // line 6
            echo "\t\t<h2>Aucun article n'est enregistré sur cette formation</h2>
\t";
        }
        // line 8
        echo "\t<ol class=\"nav nav-pills nav-stacked\">
\t  ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["summary"]) || array_key_exists("summary", $context) ? $context["summary"] : (function () { throw new Twig_Error_Runtime('Variable "summary" does not exist.', 9, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["part"]) {
            // line 10
            echo "\t  \t";
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["part"], "partTitle", array(), "any", true, true)) {
                // line 11
                echo "\t\t\t<li role=\"presentation\"> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["part"], "partTitle", array()), "html", null, true);
                echo " 
\t\t\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t\t\t";
                // line 13
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->getSourceContext(), $context["part"], "articleTitle", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                    // line 14
                    echo "\t\t\t\t\t    <li ";
                    if (((twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["request"]) || array_key_exists("request", $context) ? $context["request"] : (function () { throw new Twig_Error_Runtime('Variable "request" does not exist.', 14, $this->getSourceContext()); })()), "attributes", array()), "get", array(0 => "_route"), "method") == "wkt_platform_article_view") && (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["request"]) || array_key_exists("request", $context) ? $context["request"] : (function () { throw new Twig_Error_Runtime('Variable "request" does not exist.', 14, $this->getSourceContext()); })()), "attributes", array()), "get", array(0 => "_route_params"), "method"), "id", array(), "array") == twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "id", array())))) {
                        echo " class=\"active\" ";
                    }
                    echo " role=\"presentation\"><a href=\" ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wkt_platform_article_view", array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "id", array()), "slugTraining" => twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "slugTraining", array()), "slugArticle" => twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "slugArticle", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "page", array()), "html", null, true);
                    echo "</a></li>
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 16
                echo "\t\t\t\t</ul>
\t\t\t</li>
\t  \t";
            }
            // line 19
            echo "\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['part'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "\t</ol>
</div>

";
        
        $__internal_bbdc288a2d053d12f2881ed59e94f0d95b269c7719eee11d527a749c65dc3cff->leave($__internal_bbdc288a2d053d12f2881ed59e94f0d95b269c7719eee11d527a749c65dc3cff_prof);

        
        $__internal_2f6340556f87972873d664a152f98c3b3087107689cf481ff2458783836d20be->leave($__internal_2f6340556f87972873d664a152f98c3b3087107689cf481ff2458783836d20be_prof);

    }

    public function getTemplateName()
    {
        return "WKTPlatformBundle:Article:summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 20,  77 => 19,  72 => 16,  57 => 14,  53 => 13,  47 => 11,  44 => 10,  40 => 9,  37 => 8,  33 => 6,  31 => 5,  28 => 4,  25 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# src/WKT/PlatformBundle/Resources/views/Article/summary.html.twig #}

{# Ce template n'hérite de personne, tout comme le template inclus avec {{ include() }}. #}
<div class=\"row\">
\t{% if summary is empty %}
\t\t<h2>Aucun article n'est enregistré sur cette formation</h2>
\t{% endif %}
\t<ol class=\"nav nav-pills nav-stacked\">
\t  {% for part in summary %}
\t  \t{% if part.partTitle is defined %}
\t\t\t<li role=\"presentation\"> {{ part.partTitle }} 
\t\t\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t\t\t{% for article in part.articleTitle %}
\t\t\t\t\t    <li {% if request.attributes.get(\"_route\") == 'wkt_platform_article_view' and  request.attributes.get('_route_params')['id'] == article.id %} class=\"active\" {% endif %} role=\"presentation\"><a href=\" {{ path('wkt_platform_article_view', { 'id': article.id , 'slugTraining': article.slugTraining, 'slugArticle': article.slugArticle})}}\">{{ article.page }}</a></li>
\t\t\t\t\t{% endfor %}
\t\t\t\t</ul>
\t\t\t</li>
\t  \t{% endif %}
\t  {% endfor %}
\t</ol>
</div>

", "WKTPlatformBundle:Article:summary.html.twig", "/Users/florian/Documents/developpement/Openclassrooms/DWJ/Sites/projet5/wikitech/src/WKT/PlatformBundle/Resources/views/Article/summary.html.twig");
    }
}
