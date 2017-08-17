<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_a05c93596f3047c67b9ca78a23b2151396bea6578e60e1c61e79ed363de056cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_1f43bdf2264c5328700bcf71b54ac41c6b7b2544ebdd23e580373f6812b6a604 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1f43bdf2264c5328700bcf71b54ac41c6b7b2544ebdd23e580373f6812b6a604->enter($__internal_1f43bdf2264c5328700bcf71b54ac41c6b7b2544ebdd23e580373f6812b6a604_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_4027745d41e2c28198067b9a7767d6e59e18070833da7c02a15cc7e7d28bb80f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4027745d41e2c28198067b9a7767d6e59e18070833da7c02a15cc7e7d28bb80f->enter($__internal_4027745d41e2c28198067b9a7767d6e59e18070833da7c02a15cc7e7d28bb80f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1f43bdf2264c5328700bcf71b54ac41c6b7b2544ebdd23e580373f6812b6a604->leave($__internal_1f43bdf2264c5328700bcf71b54ac41c6b7b2544ebdd23e580373f6812b6a604_prof);

        
        $__internal_4027745d41e2c28198067b9a7767d6e59e18070833da7c02a15cc7e7d28bb80f->leave($__internal_4027745d41e2c28198067b9a7767d6e59e18070833da7c02a15cc7e7d28bb80f_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_3f50553336a4e0316e025e5c28b4fee2bf4e1d843a6aa5887b2cceb5ea4a126d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3f50553336a4e0316e025e5c28b4fee2bf4e1d843a6aa5887b2cceb5ea4a126d->enter($__internal_3f50553336a4e0316e025e5c28b4fee2bf4e1d843a6aa5887b2cceb5ea4a126d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_dcbb9fcc888f172300e40cff8d4c44f2308fa33bd97c41676337db81bb1ce6da = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_dcbb9fcc888f172300e40cff8d4c44f2308fa33bd97c41676337db81bb1ce6da->enter($__internal_dcbb9fcc888f172300e40cff8d4c44f2308fa33bd97c41676337db81bb1ce6da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_dcbb9fcc888f172300e40cff8d4c44f2308fa33bd97c41676337db81bb1ce6da->leave($__internal_dcbb9fcc888f172300e40cff8d4c44f2308fa33bd97c41676337db81bb1ce6da_prof);

        
        $__internal_3f50553336a4e0316e025e5c28b4fee2bf4e1d843a6aa5887b2cceb5ea4a126d->leave($__internal_3f50553336a4e0316e025e5c28b4fee2bf4e1d843a6aa5887b2cceb5ea4a126d_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_8f2eb2618752a6b011d4f70aeac5692cff2cb7cf924551370733469bd6c68a3d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8f2eb2618752a6b011d4f70aeac5692cff2cb7cf924551370733469bd6c68a3d->enter($__internal_8f2eb2618752a6b011d4f70aeac5692cff2cb7cf924551370733469bd6c68a3d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_7d0c3cf431895eb42b2f8e888d16183d7df1bae636441f5631824906a1c08a9f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7d0c3cf431895eb42b2f8e888d16183d7df1bae636441f5631824906a1c08a9f->enter($__internal_7d0c3cf431895eb42b2f8e888d16183d7df1bae636441f5631824906a1c08a9f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_7d0c3cf431895eb42b2f8e888d16183d7df1bae636441f5631824906a1c08a9f->leave($__internal_7d0c3cf431895eb42b2f8e888d16183d7df1bae636441f5631824906a1c08a9f_prof);

        
        $__internal_8f2eb2618752a6b011d4f70aeac5692cff2cb7cf924551370733469bd6c68a3d->leave($__internal_8f2eb2618752a6b011d4f70aeac5692cff2cb7cf924551370733469bd6c68a3d_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_9c96f17e478dbcc1bbd4df5b56a79c99b7dd350ae9f243a48dec919c22c7fb81 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9c96f17e478dbcc1bbd4df5b56a79c99b7dd350ae9f243a48dec919c22c7fb81->enter($__internal_9c96f17e478dbcc1bbd4df5b56a79c99b7dd350ae9f243a48dec919c22c7fb81_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_90ff41cf89a84e6697998221c95d10ffa85cb466526c65dcbec7d86c8ad820e4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_90ff41cf89a84e6697998221c95d10ffa85cb466526c65dcbec7d86c8ad820e4->enter($__internal_90ff41cf89a84e6697998221c95d10ffa85cb466526c65dcbec7d86c8ad820e4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) || array_key_exists("token", $context) ? $context["token"] : (function () { throw new Twig_Error_Runtime('Variable "token" does not exist.', 13, $this->getSourceContext()); })()))));
        echo "
";
        
        $__internal_90ff41cf89a84e6697998221c95d10ffa85cb466526c65dcbec7d86c8ad820e4->leave($__internal_90ff41cf89a84e6697998221c95d10ffa85cb466526c65dcbec7d86c8ad820e4_prof);

        
        $__internal_9c96f17e478dbcc1bbd4df5b56a79c99b7dd350ae9f243a48dec919c22c7fb81->leave($__internal_9c96f17e478dbcc1bbd4df5b56a79c99b7dd350ae9f243a48dec919c22c7fb81_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/Users/florian/Documents/developpement/Openclassrooms/DWJ/Sites/projet5/wikitech/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
