@php
    $introductionBgColor = 'blue-color';
@endphp
@extends('workWithUs.introduction.interviewLayout')

@section('title')
    직무인터뷰
    <p>선배들의 이야기를 통해 삼아에서 펼칠 미래를 미리 체험하세요.</p>
@endsection

@section('team')
    <h3>IT부문</h3>
    <p>
        급변하는 비즈니스 환경에 맞춰 안정적이고<br>효율적인 IT 서비스를 제공하고 있습니다.
    </p>
@endsection

@section('qna-01')
    <p class="question">Q. 담당하고 있는 업무에 대해 설명해 주세요.</p>
    <p class="answer">
        IT 부문은 안정적이고 효율적인 시스템 운영을 위해 유지보수 및 개발 업무를 지속적으로 수행하고 있으며, 새로운 시스템 도입을 기획하고 검증하는 업무를 수행하고 있습니다.
    </p>
@endsection

@section('qna-02')
    <p class="question">Q. 근무를 위해 필요한 전공과 지식에는 어떤 것이 있나요?</p>
    <p class="answer">
        정보통신 및 컴퓨터공학 계열을 전공하고 직무역량으로는 분석적/전략적 사고와 인프라, 네트워크, 보안, 개발 관련 기본 지식이 필요합니다.<br>
        타 부서와의 협업이 중요한 부서로 적극적으로 소통하며<br>
        협력적인 관계를 유지하는 것이 중요한 요소입니다.
    </p>
@endsection

@section('qna-03')
    <p class="question">Q. 삼아에서 입사를 꿈꾸는 지원자에게 전하고 싶은 이야기를 해주세요.</p>
    <p class="answer">
        IT 부문은 전공 관련 지식과 소통하려는 자세, 각 부문의 업무 프로세스에 대한 이해가 필요합니다.
        원활한 소통과 협업으로 업무에 IT 기술을 접목시켜 효율성을 높일 수 있어야 하며, 현재 시스템에 안주하지 않고 혁신을 추구할 수 있는 인재가 필요합니다. 혁신의 시작은 여러분의 도전으로부터 시작될 수 있습니다.
    </p>
@endsection
