# -*- mode: ruby -*-
# vi: set ft=ruby :
ENV["LC_ALL"] = "en_US.UTF-8"

# specify how to configure master node for ansible
$script = <<-'SCRIPT'
  yes | sudo apt-get install ansible
  touch /home/vagrant/.ssh/id_rsa && chmod 600 /home/vagrant/.ssh/id_rsa
  cat /home/vagrant/custom_private_key/insecure_private_key > /home/vagrant/.ssh/id_rsa
  chown vagrant:vagrant /home/vagrant/.ssh/id_rsa
SCRIPT

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.ssh.insert_key = false
  config.vm.synced_folder "ansible_implementation/", "/home/vagrant/ansible_implementation"
  #config.vm.synced_folder "/Users/kelechi/.vagrant.d/", "/home/vagrant/custom_private_key"
  
  config.vm.define "ansible_master" do |ansible_master|
      ansible_master.vm.provider "virtualbox" do |vb|
        ansible_master.vm.synced_folder "/Users/kelechi/.vagrant.d/", "/home/vagrant/custom_private_key"
        ansible_master.vm.hostname = "ansible-master"
        vb.name   = "ansible_master"
        vb.memory = 256
        vb.cpus   = 1
      end
      ansible_master.vm.provision "shell", inline: $script

      ansible_master.vm.network :private_network, ip: "192.168.33.30"
  end

  config.vm.define "frontend" do |frontend|
    frontend.vm.hostname = "frontend"
    frontend.vm.provider "virtualbox" do |vb|
      vb.name   = "frontend"
      vb.memory = 256
      vb.cpus   = 1
    end
    frontend.vm.network :private_network, ip: "192.168.33.31"
  end

  config.vm.define "app1" do |app1|
    app1.vm.synced_folder "ansible_implementation/wordpress", "/var/www/html"
    app1.vm.hostname = "app1"
    app1.vm.provider "virtualbox" do |vb|
      vb.name   = "app1"
      vb.memory = 256
      vb.cpus   = 1
    end
    app1.vm.network :private_network, ip: "192.168.33.32"
  end
  
  config.vm.define "app2" do |app2|
    app2.vm.synced_folder "ansible_implementation/wordpress", "/var/www/html"
    app2.vm.hostname = "app2"
    app2.vm.provider "virtualbox" do |vb|
      vb.name   = "app2"
      vb.memory = 256
      vb.cpus   = 1
    end
    app2.vm.network :private_network, ip: "192.168.33.33"
  end
  
  config.vm.define "appdb1" do |appdb1|
    appdb1.vm.hostname = "appdb1"
    appdb1.vm.provider "virtualbox" do |vb|
      vb.name   = "appdb1"
      vb.memory = 512
      vb.cpus   = 1
    end
    appdb1.vm.network :private_network, ip: "192.168.33.34"
  end
  config.vm.provision "shell", inline: "yes | sudo apt-get update && yes | sudo apt-get install python"
end
