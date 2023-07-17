<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>
<body>
    <div class="card card-primary">
        <?php if (session('mensagem')): ?>
            <div class="alert alert-success"><?php echo e(session('mensagem')); ?></div>
        <?php endif; ?>
        <?php if (session('successDelete')): ?>
            <div class="alert alert-danger"><?php echo e(session('successDelete')); ?></div>
        <?php endif; ?>
        <form action="<?php echo e(url('preencher')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                <label for="inputAddress">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do CheckList" value="<?php echo e($checklist->nome); ?>" disabled required>
            </div>
            <div class="form-group" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                <label for="inputAddress">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição" value="<?php echo e($checklist->descricao); ?>" disabled required>
            </div>

            <div class="form-row" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Actividade</label>
                    <select id="atividadeInput" class="form-control" name="atividade" disabled required>
                        <option value="" selected disabled>Selecione...</option>
                        <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($actividade->id); ?>" <?php echo e($actividade->id == $checklist->actividade_id ? 'selected' : ''); ?>><?php echo e($actividade->nome); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Máquina</label>
                    <select id="maquinaInput" class="form-control" name="maquina" disabled required>
                        <option value="" selected disabled>Selecione...</option>
                        <?php $__currentLoopData = $maquinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maquina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($maquina->id); ?>" <?php echo e($maquina->id == $checklist->maquina_id ? 'selected' : ''); ?>><?php echo e($maquina->nome); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Funcionário</label>
                    <select id="inputState" class="form-control" name="funcionario" disabled required>
                        <option value="" selected disabled>Selecione...</option>
                        <?php $__currentLoopData = $funcionarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $funcionario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($funcionario->id); ?>" <?php echo e($funcionario->id == $checklist->funcionario_id ? 'selected' : ''); ?>><?php echo e($funcionario->nome); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="card" style="margin-top: 20px; margin-left: 10px; margin-right: 10px;">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Pergunta</th>
                                <th>Resposta</th>
                                <th>Comentário</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $respostas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resposta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($resposta->pergunta->descricao); ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="respostas[<?php echo e($resposta->pergunta->id); ?>]" value="<?php echo e($resposta->nome == 'Sim' ? 'Sim' : 'Não'); ?>" disabled>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="respostas_descricao[<?php echo e($resposta->pergunta->id); ?>]" placeholder="Sem Comentários" value="<?php echo e($resposta->descricao); ?>" disabled>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>

    <script>
        console.log('Hi!');
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 5000);
    </script>
</body>
</html>
