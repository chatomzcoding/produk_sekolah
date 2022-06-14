<tr>
    <td>{{ $no }}</td>
    <td>{{ $label }}
        @if ($wajib == 'TRUE')
            <strong class="text-danger">*</strong>
        @endif
    </td>
    <td>
        <div class="form-group">
            {{ $slot }}
            <br>
            @if ($ket <> NULL)
                <small class="text-primary">{{ $ket }}</small>
            @endif
        </div>
    </td>
</tr>