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

/* layout.html.twig */
class __TwigTemplate_7569269e4c41d6f82eed4308e5fa5324530f554c83274ec65bca7961b1fdf6ec extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" />
        <meta name=\"description\" content=\"Blog\" />
        <meta name=\"author\" content=\"Bérengère\" />
        <title>
            My Blog
        </title>
        <link rel=\"icon\" type=\"image/x-icon\" href=\"public/assets/favicon.ico\" />
        <!-- Font Awesome icons (free version)-->
        <script src=\"https://use.fontawesome.com/releases/v5.15.4/js/all.js\" crossorigin=\"anonymous\"></script>
        <!-- Google fonts-->
        <link href=\"https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic\" rel=\"stylesheet\" type=\"text/css\" />
        <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=\"public/css/styles.css\" rel=\"stylesheet\" />
    </head>

    <body>
        <!-- Navigation-->
        <nav class=\"navbar navbar-expand-lg navbar-light\" id=\"mainNav\">
            <div class=\"container px-4 px-lg-5\">
                <ul class=\"navbar-nav ms-auto py-4 py-lg-0\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"index.html\">
                            Accueil
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"view/user/listPosts.html.twig\">
                            Articles
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"view/user/contact.html.twig\">
                            Contact
                        </a>
                    </li>
                </ul>
                <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
                    <ul class=\"navbar-nav ms-auto py-4 py-lg-0\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"view/user/login.html.twig\">
                                Se connecter
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"view/user/register.html.twig\">
                                S'inscrire
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Header-->
        <header class=\"masthead\" style=\"background-image: url('public/assets/img/home-bg.jpg')\">
            <div class=\"container position-relative px-4 px-lg-5\">
                <div class=\"row gx-4 gx-lg-5 justify-content-center\">
                    <div class=\"col-md-10 col-lg-8 col-xl-7\">
                        <div class=\"site-heading\">
                            ";
        // line 65
        $this->displayBlock('title', $context, $blocks);
        // line 66
        echo "                        </div>
                    </div>
                </div>
            </div>
        </header>

        ";
        // line 72
        $this->displayBlock('content', $context, $blocks);
        // line 73
        echo "
        <!-- Footer-->
        <footer class=\"border-top\">
            <div class=\"container px-4 px-lg-5\">
                <div class=\"row gx-4 gx-lg-5 justify-content-center\">
                    <div class=\"col-md-10 col-lg-8 col-xl-7\">
                        <ul class=\"list-inline text-center\">
                            <li class=\"list-inline-item\">
                                <a href=\"#!\">
                                    <span class=\"fa-stack fa-lg\">
                                        <i class=\"fas fa-circle fa-stack-2x\"></i>
                                        <i class=\"fab fa-twitter fa-stack-1x fa-inverse\"></i>
                                    </span>
                                </a>
                            </li>
                            <li class=\"list-inline-item\">
                                <a href=\"#!\">
                                    <span class=\"fa-stack fa-lg\">
                                        <i class=\"fas fa-circle fa-stack-2x\"></i>
                                        <i class=\"fab fa-facebook-f fa-stack-1x fa-inverse\"></i>
                                    </span>
                                </a>
                            </li>
                            <li class=\"list-inline-item\">
                                <a href=\"#!\">
                                    <span class=\"fa-stack fa-lg\">
                                        <i class=\"fas fa-circle fa-stack-2x\"></i>
                                        <i class=\"fab fa-github fa-stack-1x fa-inverse\"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class=\"small text-center text-muted fst-italic\">
                            Copyright &copy;
                            <a href=\"#\">
                                My blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js\"></script>
        <!-- Core theme JS-->
        <script src=\"public/js/scripts.js\"></script>
    </body>
</html>
";
    }

    // line 65
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 72
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  175 => 72,  169 => 65,  117 => 73,  115 => 72,  107 => 66,  105 => 65,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout.html.twig", "C:\\MAMP\\htdocs\\MyBlog\\view\\layout.html.twig");
    }
}
