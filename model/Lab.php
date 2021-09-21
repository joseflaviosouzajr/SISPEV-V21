<?php  

class Lab
{
 
    public $cd_pedido;
    public $atd_pedido;
    public $coletado;
    public $resultado;
    public $dh_coleta;
    public $dh_resultado;

public function getPedidoLab()
{
    return $this->cd_pedido;
}
 
public function setPedidoLab($cd_pedido1)
{
    $this->cd_pedido = $cd_pedido1;
    return $this;
}

public function getAtdPedidoLab()
{
    return $this->atd_pedido;
}
 
public function setAtdPedidoLab($atd_pedido1)
{
    $this->atd_pedido = $atd_pedido1;
    return $this;
}
 
public function getColetadoPedidoLab()
{
    return $this->coletado;
}
 
public function setColetadoPedidoLab($coletado1)
{
    $this->coletado = $coletado1;
    return $this;
}

public function getResultadoPedidoLab()
{
    return $this->resultado;
}
 
public function setResulatdoPedidoLab($resultado1)
{
    $this->resultado = $resultado1;
    return $this;
}

public function getDhColetaPedidoLab()
{
    return $this->dh_coleta;
}
 
public function setDhColetaPedidoLab($dh_coleta1)
{
    $this->dh_coleta = $dh_coleta1;
    return $this;
}


public function getDhResultadoPedidoLab()
{
    return $this->dh_resultado;
}
 
public function setDhResultadoPedidoLab($dh_resultado1)
{
    $this->dh_resultado = $dh_resultado1;
    return $this;
}






}



?>





