<div class="dockmenu-item dropup @if ( Request::segment(2)=='configuracao' ) active @endif">
    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dockmenu-item"><i class="fas fa-cogs"></i>  <span class="dockmenu-label">@lang('messages.configuration')</span></a>
    <div class="dropdown-dockmenu-menu dropdown-menu">
        <a @if ( Request::segment(3) == 'configuracaoEmails') class='active' @endif href="{{ route('configuracaoEmails', [ Request::segment(1) ]) }}">Configuração de Email</a>
        <a @if ( Request::segment(3) == 'configuracaoFornecedores') class='active' @endif href="{{ route('configuracaoFornecedores', [ Request::segment(1) ]) }}">Configuração de Fornecedores</a>
    </div>
</div>