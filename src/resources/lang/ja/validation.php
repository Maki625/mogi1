<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attributeを承認してください。',
    'active_url'           => ':attributeは、有効なURLではありません。',
    'after'                => ':attributeには、:dateより後の日付を指定してください。',
    'after_or_equal'       => ':attributeには、:date以降の日付を指定してください。',
    'alpha'                => ':attributeには、アルファベットのみ使用できます。',
    'alpha_dash'           => ":attributeには、英数字とダッシュ(-)及び下線(_)が使用できます。",
    'alpha_num'            => ':attributeには、英数字が使用できます。',
    'array'                => ':attributeには、配列を指定してください。',
    'before'               => ':attributeには、:dateより前の日付を指定してください。',
    'before_or_equal'      => ':attributeには、:date以前の日付を指定してください。',
    'between'              => [
        'numeric' => ':attributeには、:minから、:maxまでの数字を指定してください。',
        'file'    => ':attributeには、:min KBから:max KBまでのサイズのファイルを指定してください。',
        'string'  => ':attributeは、:min文字から:max文字にしてください。',
        'array'   => ':attributeの項目は、:min個から:max個にしてください。',
    ],
    'boolean'              => ":attributeには、'true'か'false'を指定してください。",
    'confirmed'            => ':attributeと確認が一致しません。',
    'date'                 => ':attributeは有効な日付ではありません。',
    'date_equals'          => ':attributeは:dateに等しい日付でなければなりません。',
    'date_format'          => ':attributeの形式は:formatと一致しません。',
    'different'            => ':attributeと:otherには、異なるものを指定してください。',
    'digits'               => ':attributeは:digits桁にしてください。',
    'digits_between'       => ':attributeは:min桁から:max桁にしてください。',
    'dimensions'           => ':attributeの画像サイズが無効です。',
    'distinct'             => ':attributeの値が重複しています。',
    'email'                => ':attributeは有効なメールアドレス形式で指定してください。',
    'ends_with'            => ':attributeは次のいずれかで終わる必要があります: :values',
    'exists'               => '選択された:attributeは有効ではありません。',
    'file'                 => ':attributeはファイルでなければなりません。',
    'filled'               => ':attributeは必須です。',
    'gt'                   => [
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'file'    => ':attributeは:value KBより大きくなければなりません。',
        'string'  => ':attributeは:value文字より大きくなければなりません。',
        'array'   => ':attributeの項目数は:value個より多くなければなりません。',
    ],
    'gte'                  => [
        'numeric' => ':attributeは:value以上でなければなりません。',
        'file'    => ':attributeは:value KB以上でなければなりません。',
        'string'  => ':attributeは:value文字以上でなければなりません。',
        'array'   => ':attributeの項目数は:value個以上でなければなりません。',
    ],
    'image'                => ':attributeには画像を指定してください。',
    'in'                   => '選択された:attributeは有効ではありません。',
    'in_array'             => ':attributeが:otherに存在しません。',
    'integer'              => ':attributeには整数を指定してください。',
    'ip'                   => ':attributeには有効なIPアドレスを指定してください。',
    'ipv4'                 => ':attributeはIPv4アドレスを指定してください。',
    'ipv6'                 => ':attributeはIPv6アドレスを指定してください。',
    'json'                 => ':attributeには有効なJSON文字列を指定してください。',
    'lt'                   => [
        'numeric' => ':attributeは:valueより小さくなければなりません。',
        'file'    => ':attributeは:value KBより小さくなければなりません。',
        'string'  => ':attributeは:value文字より小さくなければなりません。',
        'array'   => ':attributeの項目数は:value個より少なくなければなりません。',
    ],
    'lte'                  => [
        'numeric' => ':attributeは:value以下でなければなりません。',
        'file'    => ':attributeは:value KB以下でなければなりません。',
        'string'  => ':attributeは:value文字以下でなければなりません。',
        'array'   => ':attributeの項目数は:value個以下でなければなりません。',
    ],
    'max'                  => [
        'numeric' => ':attributeには:max以下の数字を指定してください。',
        'file'    => ':attributeには:max KB以下のファイルを指定してください。',
        'string'  => ':attributeは:max文字以下にしてください。',
        'array'   => ':attributeの項目は:max個以下にしてください。',
    ],
    'mimes'                => ':attributeには:valuesタイプのファイルを指定してください。',
    'mimetypes'            => ':attributeには:valuesタイプのファイルを指定してください。',
    'min'                  => [
        'numeric' => ':attributeには:min以上の数字を指定してください。',
        'file'    => ':attributeには:min KB以上のファイルを指定してください。',
        'string'  => ':attributeは:min文字以上にしてください。',
        'array'   => ':attributeの項目は:min個以上にしてください。',
    ],
    'not_in'               => '選択された:attributeは有効ではありません。',
    'not_regex'            => ':attributeの形式が無効です。',
    'numeric'              => ':attributeには数字を指定してください。',
    'present'              => ':attributeが存在している必要があります。',
    'regex'                => ':attributeには有効な正規表現を指定してください。',

    'required'             => ':attributeを入力してください',

    'required_if'          => ':otherが:valueの場合、:attributeは必須です。',
    'required_unless'      => ':otherが:valuesでない場合、:attributeは必須です。',
    'required_with'        => ':valuesが指定されている場合、:attributeは必須です。',
    'required_with_all'    => ':valuesが全て指定されている場合、:attributeは必須です。',
    'required_without'     => ':valuesが指定されていない場合、:attributeは必須です。',
    'required_without_all' => ':valuesが全て指定されていない場合、:attributeは必須です。',
    'same'                 => ':attributeと:otherが一致しません。',
    'size'                 => [
        'numeric' => ':attributeは:sizeにしてください。',
        'file'    => ':attributeは:size KBにしてください。',
        'string'  => ':attributeは:size文字にしてください。',
        'array'   => ':attributeの項目は:size個にしてください。',
    ],
    'starts_with'          => ':attributeは次のいずれかで始まる必要があります: :values',
    'string'               => ':attributeには文字を指定してください。',
    'timezone'             => ':attributeには有効なタイムゾーンを指定してください。',
    'unique'               => '指定の:attributeは既に使用されています。',
    'uploaded'             => ':attributeのアップロードに失敗しました。',
    'url'                  => ':attributeは有効なURL形式で指定してください。',
    'uuid'                 => ':attributeは有効なUUIDでなければなりません。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | You may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick
    | to specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'カスタムメッセージ',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute placeholders
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ],

];
