<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    protected $rules = [];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
                $this->rules = [
                    'nome' => 'required|string|max:255|min:5',
                    'descricao' => 'required|string|min:10',
                    'preco' => 'required|numeric',
                    'quantidade_estoque' => 'required|integer',
                    'categoria_produto_id' => 'required|integer',
                ];
                break;
            case 'PUT':
                $this->rules = [
                    'id' => 'required|integer',
                    'nome' => 'required|string|max:255|min:5',
                    'descricao' => 'required|string|min:10',
                    'preco' => 'required|numeric',
                    'quantidade_estoque' => 'required|integer',
                    'categoria_produto_id' => 'required|integer',
                ];
                break;
        }

        return $this->rules;
    }

    public function messages()
    {
        return [
            'id.required' => 'O objeto não pode ser nulo.',
            'id.integer' => 'Objeto inválido.',
        ];
    }
}
