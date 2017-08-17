<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_20b0224686bd56af89ccc6bd7125ec23a2603cfd85b9e067ba6c278fabe9be22 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1e5a9521cf821f56c05120fca3a194ebf7931f64ee3ba014d5561cabef8f9ab7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1e5a9521cf821f56c05120fca3a194ebf7931f64ee3ba014d5561cabef8f9ab7->enter($__internal_1e5a9521cf821f56c05120fca3a194ebf7931f64ee3ba014d5561cabef8f9ab7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_de6a3dc289f7b41657fb3605ec86a568f673ec0dd2e66468e676e801d6cbea63 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_de6a3dc289f7b41657fb3605ec86a568f673ec0dd2e66468e676e801d6cbea63->enter($__internal_de6a3dc289f7b41657fb3605ec86a568f673ec0dd2e66468e676e801d6cbea63_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1e5a9521cf821f56c05120fca3a194ebf7931f64ee3ba014d5561cabef8f9ab7->leave($__internal_1e5a9521cf821f56c05120fca3a194ebf7931f64ee3ba014d5561cabef8f9ab7_prof);

        
        $__internal_de6a3dc289f7b41657fb3605ec86a568f673ec0dd2e66468e676e801d6cbea63->leave($__internal_de6a3dc289f7b41657fb3605ec86a568f673ec0dd2e66468e676e801d6cbea63_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_fd61e785c05961a5c7ad613857f9fe270c4a12d8226bf40577ca66cb1b1ec868 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fd61e785c05961a5c7ad613857f9fe270c4a12d8226bf40577ca66cb1b1ec868->enter($__internal_fd61e785c05961a5c7ad613857f9fe270c4a12d8226bf40577ca66cb1b1ec868_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_123feeb942a5196c764e538eecbb99d9b2944fab1c9109e439388f97a3c6bae5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_123feeb942a5196c764e538eecbb99d9b2944fab1c9109e439388f97a3c6bae5->enter($__internal_123feeb942a5196c764e538eecbb99d9b2944fab1c9109e439388f97a3c6bae5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if (twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 4, $this->getSourceContext()); })()), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => (isset($context["token"]) || array_key_exists("token", $context) ? $context["token"] : (function () { throw new Twig_Error_Runtime('Variable "token" does not exist.', 6, $this->getSourceContext()); })()))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_123feeb942a5196c764e538eecbb99d9b2944fab1c9109e439388f97a3c6bae5->leave($__internal_123feeb942a5196c764e538eecbb99d9b2944fab1c9109e439388f97a3c6bae5_prof);

        
        $__internal_fd61e785c05961a5c7ad613857f9fe270c4a12d8226bf40577ca66cb1b1ec868->leave($__internal_fd61e785c05961a5c7ad613857f9fe270c4a12d8226bf40577ca66cb1b1ec868_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_fa681445479cdcac5af517c38bc469e55c45ed6c14c3b90008efcf155336d162 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fa681445479cdcac5af517c38bc469e55c45ed6c14c3b90008efcf155336d162->enter($__internal_fa681445479cdcac5af517c38bc469e55c45ed6c14c3b90008efcf155336d162_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_66cf363f0aebba9477994b7a7f92d17bdf677d3fd077961be4d2848cc76cfc1b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_66cf363f0aebba9477994b7a7f92d17bdf677d3fd077961be4d2848cc76cfc1b->enter($__internal_66cf363f0aebba9477994b7a7f92d17bdf677d3fd077961be4d2848cc76cfc1b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo ((twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 13, $this->getSourceContext()); })()), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if (twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 16, $this->getSourceContext()); })()), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_66cf363f0aebba9477994b7a7f92d17bdf677d3fd077961be4d2848cc76cfc1b->leave($__internal_66cf363f0aebba9477994b7a7f92d17bdf677d3fd077961be4d2848cc76cfc1b_prof);

        
        $__internal_fa681445479cdcac5af517c38bc469e55c45ed6c14c3b90008efcf155336d162->leave($__internal_fa681445479cdcac5af517c38bc469e55c45ed6c14c3b90008efcf155336d162_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_720ccd73c87b56a0667e4128fe5a3a11a1e08b20f690980b6905a8507aff39e8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_720ccd73c87b56a0667e4128fe5a3a11a1e08b20f690980b6905a8507aff39e8->enter($__internal_720ccd73c87b56a0667e4128fe5a3a11a1e08b20f690980b6905a8507aff39e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_afec5cbc14c12670811da244b682e416f92b30a920f3e3886f8af2fd40b2b31c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_afec5cbc14c12670811da244b682e416f92b30a920f3e3886f8af2fd40b2b31c->enter($__internal_afec5cbc14c12670811da244b682e416f92b30a920f3e3886f8af2fd40b2b31c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new Twig_Error_Runtime('Variable "collector" does not exist.', 27, $this->getSourceContext()); })()), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => (isset($context["token"]) || array_key_exists("token", $context) ? $context["token"] : (function () { throw new Twig_Error_Runtime('Variable "token" does not exist.', 33, $this->getSourceContext()); })()))));
            echo "
        </div>
    ";
        }
        
        $__internal_afec5cbc14c12670811da244b682e416f92b30a920f3e3886f8af2fd40b2b31c->leave($__internal_afec5cbc14c12670811da244b682e416f92b30a920f3e3886f8af2fd40b2b31c_prof);

        
        $__internal_720ccd73c87b56a0667e4128fe5a3a11a1e08b20f690980b6905a8507aff39e8->leave($__internal_720ccd73c87b56a0667e4128fe5a3a11a1e08b20f690980b6905a8507aff39e8_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "/Users/florian/Documents/developpement/Openclassrooms/DWJ/Sites/projet5/wikitech/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/exception.html.twig");
    }
}
