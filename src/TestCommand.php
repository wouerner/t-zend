<?php

namespace TZend;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

use TZend\Test;

class TestCommand extends Command {

    protected function configure()
    {
        $this->setName("app:test")
            ->setDescription("Hashes a given string using Bcrypt.")
            /* ->addArgument('Password', InputArgument::REQUIRED, 'What do you wish to hash)') */
            ->setHelp('
                O comando <info>test</info> exige o argumento <info>nome</info>.
                Exemplos:
                <comment>php app.php test Lukas</comment>
            ')
            ->addArgument('from', InputArgument::OPTIONAL, 'Arquivo')
            ->addArgument('to', InputArgument::OPTIONAL, 'Arquivo')
            ->addArgument('class', InputArgument::OPTIONAL, 'Arquivo')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $from = $input->getArgument('from');
        $to = $input->getArgument('to');
        $class = $input->getArgument('class');

        var_dump($from, $to, $class);

        /* $hash = new Hash(); */
        /* $input = $input->getArgument('Password'); */

        /* $result = $hash->hash($input); */

        /* $output->writeln('Your password hashed: ' . $result); */

        include_once($from);

        $class = new \ReflectionClass($class);
        /* var_dump($class); */
        $fileName = explode('.', $from);
        /* var_dump($fileName, $class); */
        $fileName = $fileName[0] . 'Test.php';
        $handle = fopen($fileName[0] . 'Test.php', 'w') or die('Cannot open file:  '.$nome);

        /* var_dump($class->getMethods()); */

        /* $arr = []; */
        /* foreach($class->getMethods() as $method) { */
        /*     var_dump($method->name); */
        /* } */

        $actions = array_map(function($v){
            if (stripos($v->name, "Action")) {
                return 'test' . ucfirst($v->name);
            }

        }, $class->getMethods());

/* var_dump($actions); */

        $text = '';
        foreach($actions as $action){
           $text .= <<<A
    public function  $action() {

    }

A;
        }

        $data = <<<T
<?php
class  $class->name extends MinC_Test_ControllerActionTestCase
{
$text
}
T;

        fwrite($handle, $data);
        fclose($handle);
    }
}
