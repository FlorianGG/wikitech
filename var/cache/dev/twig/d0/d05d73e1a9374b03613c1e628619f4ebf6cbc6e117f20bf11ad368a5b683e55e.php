<?php

/* @WebProfiler/Collector/ajax.html.twig */
class __TwigTemplate_995a9bdd2dd9aaeef5a806383a03de02c1dcdcac82463530b871913fbc3a596c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/ajax.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_daf15abb9dd16b1887db659b0d2ae7ed29928dcac07d42cd6cb8752cb39ad362 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_daf15abb9dd16b1887db659b0d2ae7ed29928dcac07d42cd6cb8752cb39ad362->enter($__internal_daf15abb9dd16b1887db659b0d2ae7ed29928dcac07d42cd6cb8752cb39ad362_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $__internal_a6e8137b6cbccd47c008ab92bee3ddc4d0e0a4739b3347f127897cb2808e86a1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a6e8137b6cbccd47c008ab92bee3ddc4d0e0a4739b3347f127897cb2808e86a1->enter($__internal_a6e8137b6cbccd47c008ab92bee3ddc4d0e0a4739b3347f127897cb2808e86a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_daf15abb9dd16b1887db659b0d2ae7ed29928dcac07d42cd6cb8752cb39ad362->leave($__internal_daf15abb9dd16b1887db659b0d2ae7ed29928dcac07d42cd6cb8752cb39ad362_prof);

        
        $__internal_a6e8137b6cbccd47c008ab92bee3ddc4d0e0a4739b3347f127897cb2808e86a1->leave($__internal_a6e8137b6cbccd47c008ab92bee3ddc4d0e0a4739b3347f127897cb2808e86a1_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_9f722587da7e649912ff6cab029aba585b31cd20fc2ce029274cccb2ab386a59 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9f722587da7e649912ff6cab029aba585b31cd20fc2ce029274cccb2ab386a59->enter($__internal_9f722587da7e649912ff6cab029aba585b31cd20fc2ce029274cccb2ab386a59_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_66eca4d7897b9ab0c35481a6060b7ea26dfa18175557dcb643d078fdfc73afb2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_66eca4d7897b9ab0c35481a6060b7ea26dfa18175557dcb643d078fdfc73afb2->enter($__internal_66eca4d7897b9ab0c35481a6060b7ea26dfa18175557dcb643d078fdfc73afb2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        ";
        echo twig_include($this->env, $context, "@WebProfiler/Icon/ajax.svg");
        echo "
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 8
        echo "
    ";
        // line 9
        $context["text"] = ('' === $tmp = "        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    ") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        echo "
    ";
        // line 30
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", array("link" => false));
        echo "
";
        
        $__internal_66eca4d7897b9ab0c35481a6060b7ea26dfa18175557dcb643d078fdfc73afb2->leave($__internal_66eca4d7897b9ab0c35481a6060b7ea26dfa18175557dcb643d078fdfc73afb2_prof);

        
        $__internal_9f722587da7e649912ff6cab029aba585b31cd20fc2ce029274cccb2ab386a59->leave($__internal_9f722587da7e649912ff6cab029aba585b31cd20fc2ce029274cccb2ab386a59_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 30,  82 => 29,  62 => 9,  59 => 8,  52 => 5,  49 => 4,  40 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% set icon %}
        {{ include('@WebProfiler/Icon/ajax.svg') }}
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    {% endset %}

    {% set text %}
        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    {% endset %}

    {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: false }) }}
{% endblock %}
", "@WebProfiler/Collector/ajax.html.twig", "/Users/florian/Documents/developpement/Openclassrooms/DWJ/Sites/projet5/wikitech/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/ajax.html.twig");
    }
}
