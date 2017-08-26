<!-- http://blacktie.co/2014/07/dashgum-free-dashboard/ -->
<!-- http://linuxdash.afaqtariq.com/#/system-status -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Projeto</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Ruda" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>
<body>




  <header class="black-bg">
    <a href="#" class="header-menu">
      <i class="material-icons">menu</i>
    </a>
    <a href="#" class="header-title">VirtualEasy</a>
    <nav class="header-menu-right">
      <a href="#"><i class="material-icons">date_range</i></a>
      <a href="#"><i class="material-icons">notifications</i></a>
    </nav>
  </header>
  <main>
    <h1>VirtualEasy</h1>
    <p class="font">VirtualEasy é uma plataforma Web desenvolvida para facilitar a criação de maquinas virtuais.Para isso ele utiliza da ferramenta Vagrant e do virtualbox-5.0. Caso ainda não tenha instalado as ferramentas ou a versão do VirtualBox esteja acima do 5.0, você pode fazer download clicando nas imagens abaixo </p>
    <div class="Virtualization">
      <a href="https://www.vagrantup.com/"><img id="vagrant" src="img/vagrant.png" alt="vagrant"></a>
      <a href="https://www.virtualbox.org/wiki/Download_Old_Builds"><img id="virtualbox" src="img/virtualbox.png" alt="virtualbox"></a>
    </div>
        <div class="container">
          <h1>Maquina Virtual</h1>
          <p class="font">Crie sua maquina virtual preenchendo os campos conforme sua necessidade</p>


    <form action="testeOLD.php" method="post">
      <section class="white-panel col col3">
        <header class="white-header">
          MACHINES
        </header>
        <main>

<i class="material-icons">computer</i>
          <table id="general-info">
            <tbody class="teste">
              <tr>
                <td>  <div class="radio">
                    <input id="Ubuntu Trusty  x64" name="vm[]" value="ubuntu" type="radio" checked>
                    <label for="Ubuntu Trusty  x64">Ubuntu Trusty  x64</label>
                </td>

              </tr>
              <tr>
                <td>
                    <input id="CentOS 7 x64" name="vm[]" value="centOS" type="radio">
                    <label for="CentOS 7 x64">CentOS 7 x64</label>
                </td>

              </tr>

              <tr>
                <td>
                    <input id="Debian/jessie64" name="vm[]" value="debian" type="radio">
                    <label for="Debian/jessie64">Debian Jessie x64</label>
                </td>

              </tr>

            </div>
            </tbody>
          </table>
        </main>
      </section>

      <section class="white-panel col col3">
        <header class="white-header">
          +ADD
        </header>
        <main>
          <table>
            <tbody>
              <tr>
                <td>
                  <a ><img id="apache" src="img/apache_pb2.png" alt="apache"></a>
                </td>
                <td>
                  <input name="box[]" value="apache" type="checkbox">
                </td>
              </tr>
              <tr>
                <td>
                  <a ><img id="php" src="img/php.png" alt="php"></a>
                </td>
                <td>
                  <input name="box[]" value="php" type="checkbox">
                </td>
              </tr>
              <tr>
                <td>
                  <a ><img id="mysql" src="img/mysql.svg" alt="mysql"></a>
                </td>
                <td>
                  <input name="box[]" value="mysql" type="checkbox">
                </td>
              </tr>
            </tbody>
          </table>
        </main>
      </section>

      <section id="memory-status" class="white-panel col col3">
        <header class="white-header">
          MACHINE INFO
        </header>
        <main>


                  <div>
                    <label for="address">Ip Address</label><br>
                    <input type="text" placeholder="ex: 192.168.0.1" name="address"  id="address">
                  </div>
                  <div>
                    <label for="memory">Memory (MB)</label><br>
                    <input type="text" placeholder="ex: 1024" name="memory" id="memory">
                  </div>
                  <div>
                    <label for="host">Host Name</label><br>
                    <input type="text" placeholder="ex: UbuntuLAMP" id="host" name="host">
                  </div>
                  <div>
                    <label for="mensagem">CPU's</label><br>
                    <input type="text" placeholder="ex: 1" id="cpu" name="cpu">
                  </div>

                <input type="submit" value="Criar">




<?php


  $memory = $_POST['memory'];
  $address = $_POST['address'];
  $cpu = $_POST['cpu'];
  $host = $_POST['host'];
  $_checkbox = $_POST['box'];
  $_radios = $_POST['vm'];

shell_exec('sudo touch /home/wesley/Vagrantfile');
shell_exec('sudo chmod 666 /home/wesley/Vagrantfile');

//Recria um novo Arquivo Vagrantfile
shell_exec('sudo echo "# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The \"2\" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don\'t change it unless you know what
# you\'re doing.
Vagrant.configure(2) do |config|" > /home/wesley/Vagrantfile');






shell_exec('sudo echo "  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  #https://docs.vagrantup.com.
  " >> /home/wesley/Vagrantfile');


shell_exec('sudo echo "  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://atlas.hashicorp.com/search.
  " >> /home/wesley/Vagrantfile');

/* Abaixo será verificado qual campo MACHINE foi escolhido, e escrever a devida informação no Vagrantfile*/

  if(isset($_POST['vm']))
  {



  	 foreach($_radios as $_valor)
    {

        if($_valor == "debian")
        {
          shell_exec('sudo echo "  config.vm.box = \"debian/jessie64\"" >> /home/wesley/Vagrantfile ');
        }
        if($_valor == "ubuntu")
        {
          shell_exec('sudo echo "  config.vm.box = \"ubuntu/trusty64\"" >> /home/wesley/Vagrantfile ');
        }

        if($_valor == "centOS")
        {
          shell_exec('sudo echo "  config.vm.box = \"centos/7\"" >> /home/wesley/Vagrantfile ');
        }

    }
}
/*
Configurando As opções do campo MACHINE INFO no Vagrantfile
*/


      if($address){


            shell_exec("sudo echo ' config.vm.network \"private_network\", ip: \"$address\" ' >> /home/wesley/Vagrantfile ");


      }

  if(($host)||($memory)||($cpu))
{
    shell_exec("sudo echo '
  config.vm.provider \"virtualbox\" do |vb| ' >> /home/wesley/Vagrantfile ");


    if($host){
        shell_exec("sudo echo '   vb.name = \"${host}\" ' >> /home/wesley/Vagrantfile ");

      }
    if($memory){
        shell_exec("sudo echo '   vb.memory = ${memory} ' >> /home/wesley/Vagrantfile ");

      }
    if($cpu){
      shell_exec("sudo echo '   vb.cpus = ${cpu} ' >> /home/wesley/Vagrantfile ");

      }

    shell_exec('sudo echo " end" >> /home/wesley/Vagrantfile ');
}

/*passando comandos shell para a vm depois de criada, para instalar apach2 php ou mysql */

if(isset($_POST['box']))
{
  shell_exec('sudo echo "
 config.vm.provision \"shell\", inline: <<-SHELL" >> /home/wesley/Vagrantfile ');

	 foreach($_checkbox as $_valor)
  {
    if($_valor == "apache")
    {
    //para não precisar fazer um "if" para separar a instalação do CentOS do Debian  utilizaremos os comandos de instalação dos dois
        shell_exec('sudo echo "

   sudo apt-get update
   sudo apt-get -y install apache2" >> /home/wesley/Vagrantfile');
/*sudo yum update
sudo yum -y install httpd
sudo service httpd start*/

    }
    if($_valor == "mysql")
    {
      shell_exec('sudo echo "   sudo LC-ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
   sudo apt-get update
   sudo LC-ALL=C.UTF-8 apt-get -y install php7.1-mysql
   " >> /home/wesley/Vagrantfile');
   /*sudo yum -y update > /dev/null
   sudo yum -y install mysql-server > /dev/null
   sudo yum service mysqld start > /dev/null*/
    }
    if($_valor == "php")
    {
    shell_exec('sudo echo "   sudo LC-ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
   sudo apt-get update
   sudo LC-ALL=C.UTF-8 apt-get -y install php7.1
   " >> /home/wesley/Vagrantfile');
   /*sudo yum -y update > /dev/null
   sudo yum -y install php php-mysql > /dev/null
   sudo yum service mysqld start > /dev/null*/
    }

   }
   shell_exec('sudo echo " SHELL" >> /home/wesley/Vagrantfile ');

}

shell_exec('sudo echo "end" >> /home/wesley/Vagrantfile');


 ?>

        </main>
      </section>
    </div>
  </main>
  <script src="js/index.js"></script>
 </form>

 <form name"formAjax" onsubmit="return false;">

   <button id="butao" onclick="alertando();">Consultar Pasta</button>
 </form>

 <script src="js/index.js"></script>

</body>
</html>
