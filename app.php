#!/usr/bin/env php
<?php
$loader = include __DIR__.'/vendor/autoload.php';
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use TZend\TestCommand;

$app = new Application();
$app
    ->register('hello')
    ->setDefinition(array(
        new InputArgument('nome',InputArgument::REQUIRED,'Nome de usuário.')
    ))
    ->setDescription('Função que mostra um Hello World para um usuário.')
    ->setHelp('
        O comando <info>hello</info> exige o argumento <info>nome</info>.
        Exemplos:
        <comment>php app.php hello Lukas</comment>
    ')
    ->setCode(function (InputInterface $input, OutputInterface $output){
        $nome = $input->getArgument('nome');
        $output->writeln('Hello '.$nome.'.');

        /* include_once($nome); */

        /* $class = new ReflectionClass('Teste'); */
        /* $fileName = explode('.', $class->getFileName()); */
        /* /1* var_dump($fileName[1], $class); *1/ */

        /* $handle = fopen($fileName[0] . 'test.php', 'w') or die('Cannot open file:  '.$nome); */ 
        /* $data = '<?php echo "This is the data";'; */ 
        /* fwrite($handle, $data); */
        /* fclose($handle); */
    });

$app->add(new TestCommand());

$app->run();
?>
