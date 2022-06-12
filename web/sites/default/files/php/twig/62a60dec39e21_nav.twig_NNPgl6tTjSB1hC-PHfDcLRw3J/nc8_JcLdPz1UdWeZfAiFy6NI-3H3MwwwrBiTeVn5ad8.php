<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @radix/nav/nav.twig */
class __TwigTemplate_9f23a5acb9746f3eb6a860aa8e75eaf1070563947b05ed60700308d0fe3e0ba1 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'items' => [$this, 'block_items'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 15
        echo "
";
        // line 16
        if ((($context["alignment"] ?? null) == "right")) {
            // line 17
            echo "  ";
            $context["alignment"] = "justify-content-end";
        } elseif ((        // line 18
($context["alignment"] ?? null) == "center")) {
            // line 19
            echo "  ";
            $context["alignment"] = "justify-content-center";
        } elseif ((        // line 20
($context["alignment"] ?? null) == "vertical")) {
            // line 21
            echo "  ";
            $context["alignment"] = "flex-column";
        } else {
            // line 23
            echo "  ";
            $context["alignment"] = "";
        }
        // line 25
        echo "
";
        // line 26
        $context["style"] = ((($context["style"] ?? null)) ? (("nav-" . $this->sandbox->ensureToStringAllowed(($context["style"] ?? null), 26, $this->source))) : (""));
        // line 27
        $context["fill"] = ((($context["fill"] ?? null)) ? (("nav-" . $this->sandbox->ensureToStringAllowed(($context["fill"] ?? null), 27, $this->source))) : (""));
        // line 28
        $context["is_dropdown"] = (((null === ($context["is_dropdown"] ?? null))) ? (true) : (""));
        // line 29
        echo "
";
        // line 30
        $context["nav_classes"] = twig_array_merge([0 => "nav", 1 => ($context["style"] ?? null), 2 => ($context["alignment"] ?? null), 3 => ($context["fill"] ?? null)], ((($context["utility_classes"] ?? null)) ? (($context["utility_classes"] ?? null)) : ([])));
        // line 31
        echo "
";
        // line 32
        if (($context["items"] ?? null)) {
            // line 33
            echo "  <ul";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["nav_classes"] ?? null)], "method", false, false, true, 33), 33, $this->source), "html", null, true);
            echo ">
    ";
            // line 34
            $this->displayBlock('items', $context, $blocks);
            // line 65
            echo "  </ul>
";
        }
    }

    // line 34
    public function block_items($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 35
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 36
            echo "        ";
            $context["nav_item_classes"] = [0 => "nav-item", 1 => ((twig_get_attribute($this->env, $this->source,             // line 38
$context["item"], "in_active_trail", [], "any", false, false, true, 38)) ? ("active") : ("")), 2 => ((            // line 39
($context["is_dropdown"] ?? null)) ? ("dropdown") : (""))];
            // line 41
            echo "        ";
            $context["nav_link_classes"] = [0 => "nav-link"];
            // line 42
            echo "        ";
            if (twig_test_iterable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 42), "options", [], "any", false, false, true, 42), "attributes", [], "any", false, false, true, 42), "class", [], "any", false, false, true, 42))) {
                // line 43
                echo "          ";
                $context["nav_link_classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["nav_link_classes"] ?? null), 43, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 43), "options", [], "any", false, false, true, 43), "attributes", [], "any", false, false, true, 43), "class", [], "any", false, false, true, 43), 43, $this->source));
                // line 44
                echo "        ";
            } elseif (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 44), "options", [], "any", false, false, true, 44), "attributes", [], "any", false, false, true, 44), "class", [], "any", false, false, true, 44)) {
                // line 45
                echo "          ";
                $context["nav_link_classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["nav_link_classes"] ?? null), 45, $this->source), [0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 45), "options", [], "any", false, false, true, 45), "attributes", [], "any", false, false, true, 45), "class", [], "any", false, false, true, 45)]);
                // line 46
                echo "        ";
            }
            // line 47
            echo "        <li";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 47), "addClass", [0 => ($context["nav_item_classes"] ?? null)], "method", false, false, true, 47), 47, $this->source), "html", null, true);
            echo ">
          ";
            // line 48
            if (((twig_get_attribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 48) && twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 48)) && ($context["is_dropdown"] ?? null))) {
                // line 49
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 49), 49, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 49), 49, $this->source), ["class" => twig_array_merge($this->sandbox->ensureToStringAllowed(($context["nav_link_classes"] ?? null), 49, $this->source), [0 => "dropdown-toggle"]), "data-toggle" => "dropdown"]), "html", null, true);
                echo "
            ";
                // line 50
                $this->loadTemplate("@radix/dropdown/dropdown-menu.twig", "@radix/nav/nav.twig", 50)->display(twig_array_merge($context, ["items" => twig_get_attribute($this->env, $this->source,                 // line 51
$context["item"], "below", [], "any", false, false, true, 51)]));
                // line 53
                echo "          ";
            } else {
                // line 54
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 54), 54, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 54), 54, $this->source), ["class" => ($context["nav_link_classes"] ?? null)]), "html", null, true);
                echo "
            ";
                // line 55
                if (((twig_get_attribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 55) && twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 55)) &&  !($context["is_dropdown"] ?? null))) {
                    // line 56
                    echo "              ";
                    $this->loadTemplate("@evo_radix/nav/nav.twig", "@radix/nav/nav.twig", 56)->display(twig_array_merge($context, ["items" => twig_get_attribute($this->env, $this->source,                     // line 57
$context["item"], "below", [], "any", false, false, true, 57), "is_dropdown" => false]));
                    // line 60
                    echo "            ";
                }
                // line 61
                echo "          ";
            }
            // line 62
            echo "        </li>
      ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@radix/nav/nav.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 64,  177 => 62,  174 => 61,  171 => 60,  169 => 57,  167 => 56,  165 => 55,  160 => 54,  157 => 53,  155 => 51,  154 => 50,  149 => 49,  147 => 48,  142 => 47,  139 => 46,  136 => 45,  133 => 44,  130 => 43,  127 => 42,  124 => 41,  122 => 39,  121 => 38,  119 => 36,  101 => 35,  97 => 34,  91 => 65,  89 => 34,  84 => 33,  82 => 32,  79 => 31,  77 => 30,  74 => 29,  72 => 28,  70 => 27,  68 => 26,  65 => 25,  61 => 23,  57 => 21,  55 => 20,  52 => 19,  50 => 18,  47 => 17,  45 => 16,  42 => 15,  40 => 14,);
    }

    public function getSourceContext()
    {
        return new Source("", "@radix/nav/nav.twig", "C:\\xampp\\htdocs\\apigee_local\\web\\themes\\contrib\\radix\\src\\components\\nav\\nav.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 14, "if" => 16, "set" => 17, "block" => 34, "for" => 35, "include" => 50);
        static $filters = array("merge" => 30, "escape" => 33);
        static $functions = array("link" => 49);

        try {
            $this->sandbox->checkSecurity(
                ['import', 'if', 'set', 'block', 'for', 'include'],
                ['merge', 'escape'],
                ['link']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
