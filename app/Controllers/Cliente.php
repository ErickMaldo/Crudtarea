<?php

namespace App\Controllers;

use App\Models\ClienteModel;

class Cliente extends BaseController
{
    public function listarClientes()
    {
        $cliente = new ClienteModel();
        $listaDeClientes = $cliente->paginate(10);
        $pager = $cliente->pager;
        $campoDeBusqueda = $this->request->getVar("campobusqueda");
        $valorCampo = $this->request->getVar("valorCampo");
        if ( isset($campoDeBusqueda) && isset($valorCampo) ) {
            $listaDeClientes = $cliente->select("*")->where([$campoDeBusqueda => $valorCampo])->paginate(10);
        }
        return view('cliente/listarClientes', ["clientes" => $listaDeClientes, "pager" => $pager]);
    }

    public function agregarCliente()
    {
        return view('cliente/agregarCliente');
    }

    public function registrarCliente()
    {
        if ( $this->request->getMethod() == "post" ) {
            $cliente = new ClienteModel();
            $nombres = $this->request->getPost("nombres");
            $apellidos = $this->request->getPost("apellidos");
            $telefono = $this->request->getPost("telefono");
            $email = $this->request->getPost("email");
            $dui = $this->request->getPost("dui");
            $datosCliente = [
                "nombres" => $nombres,
                "apellidos" => $apellidos,
                "telefono" => $telefono,
                "email" => $email,
                "dui" => $dui
            ];
            if ( $cliente->insert($datosCliente) === false )
                return view("/cliente/agregarCliente", ["mensajesDeError" => $cliente->errors()]);
            return redirect()->to("/clientes")->with("textflas", "Cliente insertado");
        }
    }

    public function editarCliente($id)
    {
        $cliente = new ClienteModel();
        $unCliente = $cliente->find($id);
        return view('cliente/editarCliente', ["cliente" => $unCliente]);
    }

    public function actualizarCliente($id)
    {
        if ( $this->request->getMethod() == "post" ) {
            $cliente = new ClienteModel();
            $nombres = $this->request->getPost("nombres");
            $apellidos = $this->request->getPost("apellidos");
            $telefono = $this->request->getPost("telefono");
            $email = $this->request->getPost("email");
            $dui = $this->request->getPost("dui");
            $datosCliente = [
                "id" => $id,
                "nombres" => $nombres,
                "apellidos" => $apellidos,
                "telefono" => $telefono,
                "email" => $email,
                "dui" => $dui
            ];
            if ( $cliente->update($id, $datosCliente) == false )
                return view("/cliente/editarCliente", ["mensajesDeError" => $cliente->errors(), "cliente" => $datosCliente]);
            return redirect()->to("/clientes")->with("textflas", "Cliente editado");
        }
    }

    public function eliminarCliente($id)
    {
        $cliente = new ClienteModel();
        if ( $cliente->delete($id) == false )
            return "cliente no eliminado";
        return redirect()->to("/clientes")->with("textflas", "Cliente removido");
    }
}
